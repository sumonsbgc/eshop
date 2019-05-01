<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailSubscribe extends Model
{
    use SoftDeletes;

    protected $guarded  = [];


    // const CREATED_AT = 'subscribe_start_at';
    // const UPDATED_AT = 'subscribe_update_at';
    // const DELETED_AT = 'subscribe_end_at';
    //
}
