<?php

namespace App\Api\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\Auth;
/**
 * Class UserCriteria
 */
class UserCriteria implements CriteriaInterface
{
    protected $params;
    public function __construct($params = [])
    {
        $this->params = $params;
    }
    
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $query = $model->newQuery();

        if(!empty($this->params['branch_name']))
        {
            $query->where('branch_name',mongo_id($this->params['branch_name']))->get();
        }
        if(!empty($this->params['dept_name']))
        {
            $query->where('dept_name',$this->params['dept_name'])->get();
        }
        if(!empty($this->params['shop_name']))
        {
            $query->where('shop_name',$this->params['shop_name'])->get();
        }
        if(!empty($this->params['position_name']))
        {
            $query->where('position_name',$this->params['position_name'])->get();
        }
        return $query;
    }
}
