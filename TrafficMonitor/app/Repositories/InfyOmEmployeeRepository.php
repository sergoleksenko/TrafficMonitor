<?php

namespace App\Repositories;

use App\Models\InfyOmEmployee;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InfyOmEmployeeRepository
 * @package App\Repositories
 * @version November 29, 2018, 1:29 pm UTC
 *
 * @method InfyOmEmployee findWithoutFail($id, $columns = ['*'])
 * @method InfyOmEmployee find($id, $columns = ['*'])
 * @method InfyOmEmployee first($columns = ['*'])
 */
class InfyOmEmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'name',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InfyOmEmployee::class;
    }
}
