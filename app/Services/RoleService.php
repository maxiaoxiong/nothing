<?php


namespace App\Services;


use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;

    /**
     * RoleService constructor.
     * @param $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function save($array)
    {
        return $this->roleRepository->create($array);
    }

    public function getAll()
    {
        return $this->roleRepository->getAll();
    }

    public function findById($id)
    {
        return $this->roleRepository->findById($id);
    }

    public function getRoleHasPermission($id)
    {
        return $this->roleRepository->getRoleHasPermission($id);
    }

}