<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'id_user';
    protected $table = 'users'; // Pastikan ini ke tabel yang benar
    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'nim',
        'nidn'
    ];

    protected $hidden = ['password', 'remember_token'];
    public function isMahasiswa()
{
    return $this->role === 'mahasiswa';
}

public function isDosen()
{
    return $this->role === 'dosen' || $this->role === 'dosen wali';
}

}
