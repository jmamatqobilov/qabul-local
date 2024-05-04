<?php

namespace App\Policies;

use App\Models\Document;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
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

    public function upload(User $user){
        return $user->canDo('UPLOAD_DOCUMENT');
    }

    public function destroy(User $user, Document $document){
        return ($user->id == $document->user_id);
    }
}
