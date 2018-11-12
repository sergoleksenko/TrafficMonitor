<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traffic extends Model
{
    public $timestamps = true;
    protected $table = 'traffics';
    protected $fillable = ['employee_id', 'resource', 'bytes_amount', 'created_at', 'updated_at'];
}
