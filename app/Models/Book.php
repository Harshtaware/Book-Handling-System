<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;


class Book extends Model
{

    use SoftDeletes;

   protected $fillable = [
    'title',
    'author',
    'price' ,
    'user_id'
];

        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
