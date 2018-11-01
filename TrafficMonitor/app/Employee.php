<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = true;
    protected $fillable = ['company_id', 'name', 'email'];
}
