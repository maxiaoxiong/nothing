<?php


namespace App\Services;


use App\Repositories\MenuRepository;

class MenuService
{
    protected $menuRepository;

    /**
     * MenuService constructor.
     * @param $menuRepository
     */
    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function save(array $input)
    {
        return $this->menuRepository->create($input);
    }
    

    public function getAll()
    {
        return $this->menuRepository->getAll();
    }

    public function findById($id)
    {
        return $this->menuRepository->findById($id);
    }

    public function updateById($id, array $input)
    {
        return $this->menuRepository->updateById($id, $input);
    }

    public function delete($id)
    {
        return $this->menuRepository->delete($id);
    }
}