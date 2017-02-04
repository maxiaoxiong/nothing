<?php


namespace App\Services;


use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    /**
     * CategoryService constructor.
     * @param $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function save($para)
    {
        return $this->categoryRepository->create($para);
    }

    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function saveById($id, array $input)
    {
        return $this->categoryRepository->saveById($id, $input);
    }
}