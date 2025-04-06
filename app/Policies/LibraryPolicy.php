<?php

namespace App\Policies;

use App\Models\LibraryAccess;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LibraryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    use HandlesAuthorization;

    public function view(User $currentUser, User $libraryOwner)
    {
        // Доступ разрешен если:
        // 1. Текущий пользователь - владелец библиотеки
        // 2. Или есть запись о предоставленном доступе
        return $currentUser->id === $libraryOwner->id ||
            LibraryAccess::where([
                'owner_id' => $libraryOwner->id,
                'user_id' => $currentUser->id
            ])->exists();
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
