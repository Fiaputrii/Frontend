<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenWali extends Model
{
    use HasFactory;

    protected $table = 'dosen_wali';
    protected $primaryKey = 'nidn';
    public $incrementing = false; // Karena primary key-nya bukan auto-increment
    protected $keyType = 'string'; // Kalau NPM dalam bentuk string
    public $timestamps = false; // Matikan timestamps

    protected $fillable = ['nidn', 'nama', 'email'];
}