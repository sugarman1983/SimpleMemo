<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Memo;

use Illuminate\Auth\Access\HandlesAuthorization;

class MemoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * 指定されたユーザーのメモのとき削除可能
     * 
     * @param User $user
     * @param Memo $memo
     * @return bool
     */
    public function destroy(User $user, Memo $memo)
    {
        return $user->id === $memo->user_id;}


}
