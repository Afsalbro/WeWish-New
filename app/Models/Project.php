<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    const PUBLISHED = '1';
    const UNPUBLISHED = '0';

    protected $fillable = [
        'user_id',
        'name',	
        'published'
    ];
}
