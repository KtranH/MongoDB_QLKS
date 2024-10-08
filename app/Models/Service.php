<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'dichvu';

    protected $fillable = [
        '_id',
        'tendv',
        'giadv',
        'mota'
    ];
}
