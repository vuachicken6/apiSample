<?php

namespace App\Api\Entities;

use Moloquent\Eloquent\Model as Moloquent;
use App\Api\Transformers\HistoryTransformer;
use Moloquent\Eloquent\SoftDeletes;

class History extends Moloquent
{
	use SoftDeletes;

	protected $collection = 'emp_histories';

    protected $guarded = array();

    protected $hidden = ['updated_at','deleted_at'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start_package',
        'end_package',
        'last_activity'
    ];

    public function transform(string $type = '')
    {
        $transformer = new HistoryTransformer();

        return $transformer->transform($this, $type);
    }

    public function transformSelect()
    {
        $transformer = new HistoryTransformer();

        return $transformer->transformSelect($this);
    }

}
