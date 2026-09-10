<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_title',
        'company',
        'job_description',
        'applied_at',
        'job_address',
        'contact_no',
        'source_link',
        'status',
        'notes',
    ];
}
