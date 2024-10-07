<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'khach';

    protected $fillable = [
        '_id',
        'tenkh',
        'cccd',
        'sdt',
    ];
}
