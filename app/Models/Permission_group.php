<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Permission_group extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'nhomquyen';

    protected $fillable = [
        '_id',
        'maq',
        'tennhom'
    ];
}
