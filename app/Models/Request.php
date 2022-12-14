<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'user_id', 'company_id', 'cv_path', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
