<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class InfyOmEmployee
 * @package App\Models
 * @version November 29, 2018, 1:29 pm UTC
 *
 * @property integer company_id
 * @property string name
 * @property string email
 */
class InfyOmEmployee extends Model
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
    public $table = 'employees';
    public $fillable = [
        'company_id',
        'name',
        'email'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'name' => 'string',
        'email' => 'string'
    ];


}
