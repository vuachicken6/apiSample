<?php

namespace App\Api\Transformers;

use League\Fractal\TransformerAbstract;
use App\Api\Entities\User;

/**
 * Class UserTransformer
 */
class UserTransformer extends TransformerAbstract
{

    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => $model->_id,

            

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
