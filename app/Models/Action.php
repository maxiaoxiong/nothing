<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = ['group', 'name', 'desc', 'action', 'status'];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}