<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    const C1 = 'Happy BirthDay';
    const C2 = 'Happy Anniversary';
    const C3 = 'Happy Retirement';
    const C4 = 'Our Condolonces';
    const C5 = '';

    const TEXTTYPE = 0;
    const GIFTYPE = 1;
    const VIDEOTYPE = 2;

    protected $fillable = [
        'p_id',
        'name',
        'email',
        'category',
        'message',
        'file_type',
        'file_name'
    ];

    public function projects(){
        return $this->hasOne(Project::class, 'id', 'p_id')->whereUser_id(auth()->user()->id);
    }
}
