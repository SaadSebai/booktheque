<?php

namespace App\Policies;

use App\User;
use App\Livre;
use Illuminate\Auth\Access\HandlesAuthorization;

class LivrePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the livre.
     *
     * @param  \App\User  $user
     * @param  \App\Livre  $livre
     * @return mixed
     */
    public function view(User $user, Livre $livre)
    {
        return true;
    }

    /**
     * Determine whether the user can create livres.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the livre.
     *
     * @param  \App\User  $user
     * @param  \App\Livre  $livre
     * @return mixed
     */
    public function update(User $user, Livre $livre)
    {
        return $user->id === $livre->user_id;
    }

    /**
     * Determine whether the user can delete the livre.
     *
     * @param  \App\User  $user
     * @param  \App\Livre  $livre
     * @return mixed
     */
    public function delete(User $user, Livre $livre)
    {
        return $user->id === $livre->user_id;
    }
}
