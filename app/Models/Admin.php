<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\HasName; // 1. Tambahkan contract/interface ini

class Admin extends Authenticatable implements HasName // 2. Implementasikan HasName
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'password'];
    protected $hidden = ['password'];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public $timestamps = false;

    public function getFilamentName(): string
    {
        return explode('@', $this->email)[0];
    }
}