<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    //

    protected $fillable = ['word_suomi', 'word_rus', 'user_id', 'img'];
    protected $guarded = ['id'];

    public static function deleteImageFromWord($image){
        unlink(public_path('/img/word/'.$image));
    }
}
