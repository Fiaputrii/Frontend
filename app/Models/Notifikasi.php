<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    protected $primaryKey = 'id_notifikasi';
    public $incrementing = false; // Karena primary key-nya bukan auto-increment
    protected $keyType = 'string'; // Kalau NPM dalam bentuk string
    public $timestamps = false; // Matikan timestamps

    protected $fillable = ['tipe', 'tanggal_kirim', 'pesan', 'nim', 'nidm'];
}