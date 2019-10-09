<?php

namespace App\Policies;

use App\User;
use App\Comment;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommintPolicy
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

    public function delete(User $user,Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

    public function create(User $user,Post $post)
    {
        return $user->id === $post->user_id || in_array($user->id,$user->following()->where(["accepted"=>1])->pluck("to_user_id")->toArray());
    }
}
