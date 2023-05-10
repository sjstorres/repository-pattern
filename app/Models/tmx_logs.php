<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tmx_logs extends Model
{
    use HasFactory;
    protected $fillable = ['crn', 'request', 'response'];
    protected $casts = [
        'request' => 'array',
        'response'=> 'array'
    ];
}
