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

    public function showUserLibrary(User $user)
    {
        // Проверка прав происходит через Policy (автоматически)

        // Проверка прав доступа
        if (auth()->id() !== $user->id &&
            !LibraryAccess::where('owner_id', $user->id)
                ->where('user_id', auth()->id())
                ->exists()) {
            return redirect()->route('library.access.form')
                ->with('error', 'У вас нет доступа к этой библиотеке');
        }

        // Загружаем книги с информацией о владельце
        $books = $user->books()->with('user')->get();

        return view('library.show', [
            'books' => $books,
            'libraryOwner' => $user
        ]);
    }
    /*

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
