<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table='jobs';
    protected $fillable = [
        'id',
        'job_title',
        'job_region',
        'job_type',
        'company',
        'vacancy',
        'salary',
        'gender',
        'experience',
        'application_deadline',
        'jobDescription',
        'responsablities',
        'education_experience',
        'otherBenifits',
        'image',
        'category',
        'created_at',
        'updated_at'

    ];
    public $timestamps=true;
}
