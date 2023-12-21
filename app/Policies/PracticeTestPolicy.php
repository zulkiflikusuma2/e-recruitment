<?php

namespace App\Policies;

use App\Models\User;
use App\Models\practice_test;
use Illuminate\Auth\Access\HandlesAuthorization;

class PracticeTestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\practice_test  $practiceTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, practice_test $practiceTest)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\practice_test  $practiceTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, practice_test $practiceTest)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\practice_test  $practiceTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, practice_test $practiceTest)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\practice_test  $practiceTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, practice_test $practiceTest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\practice_test  $practiceTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, practice_test $practiceTest)
    {
        //
    }
}
