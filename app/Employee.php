<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'employee_id', 'name', 'department_id', 'designation', 'card_type', 'status', 'blood_id', 'mobile','image', 'author_id'
    ];
}