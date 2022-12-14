<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = 'pengguna';
  protected $rememberTokenName = 'remember_token';

  public function getAuthPassword()
  {
    return $this->kata_sandi;
  }

  protected $hidden = [
    'kata_sandi',
    'remember_token',
  ];
}
