<?php

namespace App\Policies;

use App\Models\Application;
use App\User;
use App\Models\Endpoint;
use Illuminate\Auth\Access\HandlesAuthorization;

class EndpointPolicy
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

    public function show(User $user, Endpoint $endpoint){
        return
            $user->can('MANAGE_APPLICATIONS') ||
            (
                $user->can('ADD_ENDPOINT') &&
                $endpoint->application->owner->id == $user->id &&
                $endpoint->application->status->level > 19
            );
    }

    public function moderate(User $user, Endpoint $endpoint){
        return (
            $user->can('MODERATE_ENDPOINTS') &&
            $endpoint->application->hududiy->id == $user->territory->id &&
            $endpoint->application->status->level > 19 &&
            $endpoint->application->status->code != 'refill_endpoints'
        );
    }

    public function edit(User $user, Endpoint $endpoint){
        return
            $user->can('MANAGE_APPLICATIONS') ||
            (
                $user->can('ADD_ENDPOINT') &&
                $endpoint->application->owner->id == $user->id &&
                $endpoint->application->status->level > 19 &&
                (
                    $endpoint->application->status->code == 'object_filling' ||
                    $endpoint->application->status->code == 'object_filling_complete' ||
                    $endpoint->application->status->code == 'validation_objects' ||
                    $endpoint->application->status->code == 'refill_objects' ||
                    $endpoint->application->status->code == 'refill_endpoints'
                )
            );
    }

    public function delete(User $user, Endpoint $endpoint){
        return
            $user->can('MANAGE_APPLICATIONS') ||
            (
                $user->can('ADD_ENDPOINT') &&
                $endpoint->application->owner->id == $user->id &&
                $endpoint->application->status->level > 19 &&
                (
                    $endpoint->application->status->code == 'object_filling' ||
                    $endpoint->application->status->code == 'object_filling_complete' ||
                    $endpoint->application->status->code == 'validation_objects' ||
                    $endpoint->application->status->code == 'refill_objects' ||
                    $endpoint->application->status->code == 'refill_endpoints'
                )
            );
    }

}
