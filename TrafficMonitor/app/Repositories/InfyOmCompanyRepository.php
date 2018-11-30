<?php

namespace App\Repositories;

use App\Models\InfyOmCompany;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InfyOmCompanyRepository
 * @package App\Repositories
 * @version November 29, 2018, 1:14 pm UTC
 *
 * @method InfyOmCompany findWithoutFail($id, $columns = ['*'])
 * @method InfyOmCompany find($id, $columns = ['*'])
 * @method InfyOmCompany first($columns = ['*'])
 */
class InfyOmCompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'quota'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InfyOmCompany::class;
    }
}
