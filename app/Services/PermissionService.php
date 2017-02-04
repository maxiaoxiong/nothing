<?php


namespace App\Services;


use App\Repositories\PermissionRepository;

class PermissionService
{
    protected $permissionRepository;

    /**
     * PermissionService constructor.
     * @param $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function create(array $para)
    {
        return $this->permissionRepository->create($para);
    }

    public function getAll()
    {
        return $this->permissionRepository->getAll();
    }

    public function updateById($id, array $input)
    {
        return $this->permissionRepository->updateById($id, $input);
    }

    public function getAllMenusByPermission($permission)
    {
        return $this->permissionRepository->getAllMenusByPermission($permission);
    }

    public function getAllActionsByPermission($permission)
    {
        return $this->permissionRepository->getAllActionsByPermission($permission);
    }


}