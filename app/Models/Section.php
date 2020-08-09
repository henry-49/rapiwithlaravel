<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    // Protecting the Subject fields
    protected $fillable = [
        'class_id',
        'section_name'
    ];
}
