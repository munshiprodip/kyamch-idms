<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accesslist extends Model
{
    protected $fillable = [
        'door_id', 'employee_id'
    ];
}
