<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Detail_Reservation extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'ct_phieudatphong';
    protected $fillable = [
        '_id',
        'mapdp',
        'makh'
    ];
}
