<?php


namespace App\Repositories;


class RoleRepository extends BaseRepository
{
    public function getRoleHasPermission($id)
    {
        $role = $this->findById($id);

        return $role->perms->pluck('id')->toArray();
    }
}