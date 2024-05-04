<?php

namespace App\Policies;

use App\Models\ParentObject;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParentObjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user, ParentObject $object)
    {
        return ($user->can('ADD_OBJECT') || $object->application->owner_id == $user->id);
    }
    public function edit(User $user, ParentObject $object)
    {
        return ($user->can('ADD_OBJECT') || $object->application->owner_id == $user->id);
    }
}
