<?php


namespace App\Presenters;


class UserPresenter
{
    public function judgeUserRoleAssociation($role, $user = null)
    {
        if ($user == null) {
            return '';
        }
        
        $user_role_ids = $user->roles->pluck('id')->toArray();
        
        if (in_array($role, $user_role_ids)) {
            return 'selected';
        }
        return '';
    }
}