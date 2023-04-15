<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';

    const TEXTTYPE = '0';
    const GIFTYPE = '1';
    const VIDEOTYPE = '2';

    protected $fillable = [
        'p_id',
        'name',
        'email',
        'message',
        'file_type',
        'file_name'
    ];
}
