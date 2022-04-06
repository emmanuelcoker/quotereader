<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;


    protected $table = 'quotes';

    protected $fillable = [
        'author_id',
        'category_id',
        'content',
        'scheduled_date',
    ];

    public function authors(){
        return $this->belongsTo('App\Models\Author', 'author_id');
    }

    public function categories(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function favourites(){
        return $this->hasMany('App\Models\Favourite', 'quote_id');
    }


    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
