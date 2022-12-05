<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'department',
        'Depthead',
        'hour',
        'shortdesc',
        'description',
        'image',
        'admissionfee',
        'semesterfee',
        'tutionfee',
        'totalcost',
        'status'
    ];
}
