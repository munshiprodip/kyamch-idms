<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    protected $fillable = [
        'name', 'employee_id', 'quentity', 'consumption_type', 'author'
    ];
}
