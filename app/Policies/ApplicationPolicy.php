<?php

namespace App\Policies;

use App\User;
use App\Models\Application;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
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

    public function create(User $user)
    {
        return ($user->can('MANAGE_APPLICATIONS') || $user->can('GIVE_APPLICATION'));
    }

    public function see(User $user, Application $application){
        return (
            $user->can('MANAGE_APPLICATIONS') ||
            (
                $user->can('GIVE_APPLICATION') &&
                $user->id == $application->owner_id
            ) ||
            (
                $user->can('MODERATE_APPLICATION') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            ) ||
            (
                $user->can('MONITOR') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('MODERATE_APPLICATION') &&
                $user->is_director
            ) ||
            (
                $user->can('MODERATE_OBJECTS') &&
                $user->can('MODERATE_ENDPOINTS') &&
                $application->status->level > 19 &&
                $user->territory->id == $application->hududiy_id
            )
        );
    }
    public function apply(User $user, Application $application){
        return (
            $user->can('MODERATE_APPLICATION') &&
            $user->is_director
        );
    }
    public function close(User $user, Application $application){
        return (
            $user->can('MODERATE_APPLICATION') &&
            $user->is_director &&
            $application->status->code == 'order_close'
        );
    }

    public function add_object(User $user, Application $application){
        return (
            $user->can('ADD_OBJECT') &&
            $user->id == $application->owner_id &&
            (
                $application->status->code == 'object_filling' ||
                $application->status->code == 'refill_objects'
            ) &&
            $application->objects->whereNull('deleted_at')->count() < $application->objects_count
        );
    }
    public function edit_object(User $user, Application $application){
        return (
            $user->can('ADD_OBJECT') &&
            $user->id == $application->owner_id &&
            (
                $application->status->code == 'object_filling' ||
                $application->status->code == 'refill_objects'
            )
        );
    }
    public function delete_object(User $user, Application $application)
    {
        return (
            $user->can('ADD_OBJECT') &&
            $user->id == $application->owner_id &&
            $application->status->level == 32
        );
    }

    public function object_restore(User $user, Application $application)
    {
        return (
            $user->can('MODERATE_APPLICATION') &&
            isset($user->direction_id) &&
            $user->direction_id == $application->direction_id
        );
    }

    public function endpoints_list(User $user, Application $application){
        return (
            $user->can('ADD_ENDPOINT') &&
            $user->id == $application->owner_id &&
            $application->status->level > 19
        );
    }

    public function message_access(User $user, Application $application){
        return (
            (
                $user->can('MONITOR') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('MODERATE_OBJECTS') &&
                isset($user->territory_id) &&
                $user->territory_id == $application->hududiy_id
            )||
            (
                $user->can('MODERATE_APPLICATION') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('GIVE_APPLICATION') &&
                $user->id == $application->owner_id
            )
        );
    }


    public function hududiy_objects_list(User $user, Application $application){
        return (
            (
                $user->can('MONITOR') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('MODERATE_APPLICATION') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('MODERATE_APPLICATION') &&
                $user->is_director
            )||
            (
                $user->can('MODERATE_OBJECTS') &&
                $user->territory->id == $application->hududiy_id &&
                $application->status->level > 19
            )
        );
    }
    public function hududiy_objects_edit(User $user, Application $application){
        return (
            $user->can('MODERATE_OBJECTS') &&
            $user->territory->id == $application->hududiy_id &&
            $application->status->code == 'validation_objects'
        );
    }
    public function hududiy_endpoints_list(User $user, Application $application){
        return (
            $user->can('MANAGE_APPLICATIONS') ||
            (
                $user->can('MODERATE_APPLICATION') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('MONITOR') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('MODERATE_APPLICATION') &&
                isset($user->is_director)
            )||
            (
                $user->can('MODERATE_ENDPOINTS') &&
                $user->territory->id == $application->hududiy_id &&
                $application->status->level > 19
            )
        );
    }
    public function hududiy_inspections_list(User $user, Application $application){
        return (
            (
                $user->can('MODERATE_APPLICATION') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('MONITOR') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('MODERATE_OBJECTS') &&
                $user->territory->id == $application->hududiy_id
            )
        );
    }

    public function hududiy_inspections_edit(User $user, Application $application){
        return (
            $user->can('MODERATE_OBJECTS') &&
            $user->territory->id == $application->hududiy_id &&
            $application->status->code == 'on_site_validation'
        );
    }
    public function ukn_objects_delete(User $user, Application $application){
        return (
            $user->can('MODERATE_APPLICATION') &&
            isset($user->direction_id) &&
            $user->direction_id == $application->direction_id &&
            $application->status->level == 32
        );
    }


    public function change_status(User $user, Application $application)
    {
        return (
            $user->can('MANAGE_APPLICATIONS') ||
            (
                $user->can('MODERATE_APPLICATION') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id
            )||
            (
                $user->can('MODERATE_APPLICATION') &&
                $user->is_director &&
                $application->status->code == 'order_close'
            )||
            (
                $user->can('MODERATE_OBJECTS') &&
                $user->can('MODERATE_ENDPOINTS') &&
                $user->territory->id == $application->hududiy_id
            )
        );
    }

    public function sendToValidate(User $user, Application $application){
        return (
            $user->can('ADD_OBJECT') &&
            $user->id == $application->owner_id &&
            (
                $application->status->code == 'object_filling' ||
                $application->status->code == 'refill_objects'
            ) &&
            $application->objects->whereNull('deleted_at')->count() == $application->objects_count
        );
    }

    public function refill_endpoints_done(User $user, Application $application){
        return (
            $user->can('ADD_OBJECT') &&
            $user->id == $application->owner_id &&
            $application->status->code == 'refill_endpoints'
        );
    }

    public function edit(User $user, Application $application)
    {
        return (
            $user->can('MANAGE_APPLICATIONS') ||
            (
                $user->can('GIVE_APPLICATION') &&
                $user->id == $application->owner_id &&
                $application->status->level < 32
            ) ||
            (
                $user->can('MODERATE_APPLICATION') &&
                isset($user->direction_id) &&
                $user->direction_id == $application->direction_id &&
                $application->status->code != 'refill' &&
                $application->status->level < 32
            )
        );
    }

    public function attach_act(User $user, Application $application){
        return (
            $user->can('GIVE_APPLICATION') &&
            $user->id == $application->owner_id &&
            $application->status->code == 'attach_act'
        );
    }

    public function setDecree(User $user, Application $application)
    {
        return (
            $user->can('MODERATE_APPLICATION') &&
            isset($user->direction) &&
            $user->direction->id == $application->direction->id &&
            (
                $application->status->code == 'application_validation' ||
                $application->status->code == 'order_attached' ||
                $application->status->level >= 20
            )
        );
    }

    public function delete(User $user){
        return $user->can('MANAGE_APPLICATIONS');
    }

    public function create_endpoint(User $user, Application $application)
    {
        return
             $user->can('ADD_ENDPOINT') &&
             $application->owner->id == $user->id &&
             $application->status->level > 19 &&
             (
                 $application->status->code == 'object_filling' ||
                 $application->status->code == 'object_filling_complete' ||
                 $application->status->code == 'validation_objects' ||
                 $application->status->code == 'refill_endpoints' ||
                 $application->status->code == 'refill_objects'
             );
    }
}
