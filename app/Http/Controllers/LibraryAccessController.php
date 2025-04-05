<?php

namespace App\Http\Controllers;

use App\Models\LibraryAccess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryAccessController extends Controller
{
    public function grantAccessById(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id|not_in:'.auth()->id()
        ], [
            'user_id.not_in' => 'Нельзя предоставить доступ самому себе',
            'user_id.exists' => 'Пользователь с таким ID не найден'
        ]);

        try {
            // Проверяем существование доступа
            if (LibraryAccess::where([
                'owner_id' => auth()->id(),
                'user_id' => $validated['user_id']
            ])->exists()) {
                return back()->with('info', 'Этот пользователь уже имеет доступ');
            }

            // Создаем запись о доступе
            LibraryAccess::create([
                'owner_id' => auth()->id(),
                'user_id' => $validated['user_id']
            ]);

            return back()->with('success', 'Доступ успешно предоставлен!');

        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка: '.$e->getMessage());
        }
    }
    /*
    public function revokeAccess($userId)
    {
        $access = LibraryAccess::where('owner_id', auth()->id())
            ->where('user_id', $userId)
            ->firstOrFail();

        $access->delete();

        return response()->json(['message' => 'Доступ отозван']);
    }

    public function mySharedUsers()
    {
        $users = auth()->user()->sharedLibraryTo()->with('user')->get();
        return response()->json($users);
    }

    public function accessibleLibraries()
    {
        $libraries = auth()->user()->sharedLibraryFrom()->with('owner')->get();
        return response()->json($libraries);
    }
    */
}
