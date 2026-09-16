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

    protected $casts = [
        'applied_at' => 'date',
    ];

    public function scopeFilterByStatus($query, $status){ //filter status
        $query->when($status, function ($query, $status) {
            $query->where('status', $status);
        });
    }

    public function scopeSearch($query, $term){ //search
        $query->when($term, function ($query, $term) {
            $query->where('company', 'like', '%' . $term . '%')
                  ->orWhere('job_title', 'like', '%' . $term . '%')
                  ->orWhere('job_address', 'like', '%' . $term . '%')
                  ->orWhere('applied_at', 'like', '%' . $term . '%')
                  ->orWhere('source_link', 'like', '%' . $term . '%')
                  ->orWhere('status', 'like', '%' . $term . '%');
        });
    }
}
