<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table='search';
    protected $fillable = [
        'id',
        'keyword'
        
        
    ];
    public $timestamps=true;
}
