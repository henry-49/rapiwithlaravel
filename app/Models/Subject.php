<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // Protecting the Subject fields
    protected $fillable = [
        'class_id',
        'subject_name',
        'subject_code'
    ];
}
