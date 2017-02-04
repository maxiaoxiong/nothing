<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'icon', 'route', 'desc', 'sort', 'hide', 'parent_id'];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}