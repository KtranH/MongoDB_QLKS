<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'phieudatphong';
    protected $fillable = [
        '_id',
        'manv',
        'maph',
        'ngaylap',
        'ngaydat',
        'ngaytra'
    ];
}
