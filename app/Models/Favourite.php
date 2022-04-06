<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $table = 'favourites';

    protected $fillable = [
        'user_id',
        'quote_id'
    ];

    public function user(){
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function quotes(){
        return $this->hasMany('App\Models\Quote', 'id');
    }
}
