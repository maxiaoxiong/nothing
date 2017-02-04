<?php


namespace App\Services;


use App\Repositories\BaseRepository;

class BaseService
{
    protected $modelRepository;

    /**
     * BaseService constructor.
     * @param $modelRepository
     */
    public function __construct(BaseRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

}