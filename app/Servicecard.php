<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicecard extends Model
{
    protected $fillable = [
        'department_id', 'service_id', 'place','status'
    ];
}
