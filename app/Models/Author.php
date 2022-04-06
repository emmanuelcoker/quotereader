<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    protected $fillable = [
        'author_name',
        'about',
    ];

    public function quotes(){
        return $this->hasMany('App\Models\Quote');
    }

    // public function getRouteKeyName(){
    //     return 'slug';
    // }
}
