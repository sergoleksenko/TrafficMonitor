<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class InfyOmCompany
 * @package App\Models
 * @version November 29, 2018, 1:14 pm UTC
 *
 * @property string name
 * @property integer quota
 */
class InfyOmCompany extends Model
{

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public $table = 'companies';
    public $fillable = [
        'name',
        'quota'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'quota' => 'integer'
    ];


}
