<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    //

    protected $fillable = ['word_suomi', 'word_rus'];
    protected $guarded = ['id'];
}
