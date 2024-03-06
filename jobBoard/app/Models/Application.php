<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table='applications';
    protected $fillable = [
        'id',
        'cv',
        'email',
        'job_id',
        'user_id',
        'job_image',
        'job_title',
        'job_region',
        'job_type',
        'company'

    ];
    public $timestamps=true;
}
