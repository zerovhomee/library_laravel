<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Http\Requests\LibraryAccess\grantAccessbyIdRequest;
use App\Models\LibraryAccess;
use App\Models\User;

class AdmissionController extends BaseController
{

    public function grantAccessById(grantAccessbyIdRequest $request)
    {
        $validated = $request->validated();

        try {

            if (LibraryAccess::where([
                'owner_id' => auth()->id(),
                'user_id' => $validated['user_id']
            ])->exists()) {
                return response()->json(['message' => 'Этот пользователь уже имеет доступ']);
            }

            $validated += ['owner_id' => auth()->id()];
            $this->service->store($validated);

            return response()->json(['message' => 'Доступ успешно предоставлен!']);


        } catch (\Exception $e) {
            return response()->json(['message' => 'Ошибка: '.$e->getMessage()]);
        }
    }
    /* created for views
    public function showAccessForm()
    {
        return view('library.form');
    }

    public function accessLibrary(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id'
        ]);

        $userId = $validated['user_id'];
        $user = User::find($validated['user_id']);

        if (!$user) {
            return back()->with('error', 'Пользователь не найден');
        }

        return redirect()->route('users.library.show', ['user' => $userId]);
    }
    */
    public function showUserLibrary(User $user)
    {
        if (auth()->id() !== $user->id &&
            !LibraryAccess::where('owner_id', $user->id)
                ->where('user_id', auth()->id())
                ->exists()) {
            return response()->json(['У вас нет доступа к этой библиотеке']);
        }

        $books = $user->books()->with('user')->get();

        return $books;
    }

}
