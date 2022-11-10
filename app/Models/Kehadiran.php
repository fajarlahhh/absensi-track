<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
  use HasFactory;

  protected $table = 'kehadiran';

  public function anggota()
  {
    return $this->belongsTo(Anggota::class);
  }
}
