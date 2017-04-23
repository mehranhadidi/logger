<?php

namespace App;

use Helpers\Traits\Model;

class Project
{
    use Model;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    static $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    static $fillable = [
        'user_id',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];
}
