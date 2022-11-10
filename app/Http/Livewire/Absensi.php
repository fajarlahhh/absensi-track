<?php

namespace App\Http\Livewire;

use App\Models\Kehadiran;
use Livewire\Component;

class Absensi extends Component
{
  public $tanggal;

  protected $queryString = ['tanggal'];

  protected $listeners = [
    'settanggal' => 'setTanggal',
  ];

  public function setTanggal($tanggal)
  {
    $this->tanggal = $tanggal;
  }

  public function mount()
  {
    $this->tanggal = $this->tanggal ?: date('Y-m-d');
  }

  public function render()
  {
    return view('livewire.absensi', [
      'data' => Kehadiran::whereRaw('date(created_at) = "' . $this->tanggal . '"')->get(),
    ]);
  }
}
