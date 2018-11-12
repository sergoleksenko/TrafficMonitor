<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = true;
    protected $fillable = ['name', 'quota'];
}
