<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{

    protected $model;

    /**
     * BaseRepository constructor.
     * @param $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function save(array $input)
    {
        return $this->model->create($input);
    }

    // 不适用与 user
    public function saveById($id, array $input)
    {
        $item = self::findById($id);
        
        foreach ($input as $key => $value) {
            $item->$key = $value;
        }

        if ($item->save()) {
            return $item;
        }

        return $item;
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function updateById($id, array $input)
    {
        $item = self::findById($id);

        if ($item->where('id', $id)->update($input)) {
            return $item;
        }
        
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function getPagination($per = 3)
    {
        return $this->model->paginate($per);
    }
}
