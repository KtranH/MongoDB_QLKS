<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $connection  = 'mongodb';
    protected $collection  = 'nhanvien';

    protected $fillable = ['_id','tennv','ngaysinh','tentk','ngvl','sdt','email','diachi','cmnd', 'MaNhomQuyen', 'Matkhau'];

    protected $hidden = ['Matkhau'];

    public function getPosition()
    {
        return $this->belongsTo(Permission_group::class, 'MaNhomQuyen', 'maq');
    }
}
