<?php


namespace App\Services;


use App\Repositories\ActionRepository;

class ActionService
{
    private $actionRepository;

    /**
     * ActionService constructor.
     * @param $actionRepository
     */
    public function __construct(ActionRepository $actionRepository)
    {
        $this->actionRepository = $actionRepository;
    }

    public function getAll()
    {
        return $this->actionRepository->getAll();
    }

    public function save(array $input)
    {
        return $this->actionRepository->create($input);
    }

    public function updateById($id, array $input)
    {
        return $this->actionRepository->updateById($id, $input);
    }

    public function delete($id)
    {
        return $this->actionRepository->delete($id);
    }
}