<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $fillable = ['name', 'word_id'];
    protected $guarded = ['id'];
}
