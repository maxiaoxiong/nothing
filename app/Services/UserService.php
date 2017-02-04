<?php


namespace App\Services;


use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    /**
     * UserService constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function save(array $input)
    {
        return $this->userRepository->create($input);
    }

    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function update($id, array $input)
    {
        return $this->userRepository->updateById($id, $input);
    }

}