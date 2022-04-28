<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewPerusahaan(User $user)
    {
        return in_array($user->role, ['Owner', 'Admin', 'Karyawan']);
    }

    public function viewAdmin(User $user)
    {
        return $user->role == 'Owner';
    }

    public function viewKaryawan(User $user)
    {
        return $user->role == 'Admin';
    }

    public function viewPagePenjualan(User $user)
    {
        return in_array($user->role, ['Owner', 'Admin']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createPerusahaan(User $user)
    {
        return $user->role == 'Owner';
    }

    public function createAdmin(User $user)
    {
        return $user->role == 'Owner';
    }

    public function createKaryawan(User $user)
    {
        return $user->role == 'Admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updatePerusahaan(User $user)
    {
        return $user->role == 'Owner';
    }

    public function updateAdmin(User $user)
    {
        return $user->role == 'Owner';
    }

    public function updateKaryawan(User $user)
    {
        return $user->role == 'Admin';
    }

    public function update(User $user)
    {
        return in_array($user->role, ['Karyawan', 'Admin', 'Owner']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function destroyAdmin(User $user)
    {
        return $user->role == 'Owner';
    }

    public function destroyKaryawan(User $user)
    {
        return $user->role == 'Admin';
    }
}
