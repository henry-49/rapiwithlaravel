<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Protecting the Subject fields
    protected $fillable = [
        'class_id',
        'section_id',
        'name',
        'phone',
        'email',
        'password',
        'photo',
        'address',
        'gender'
    ];
}
