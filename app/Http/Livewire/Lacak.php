<?php

namespace App\Http\Livewire;

use App\Models\Anggota;
use Livewire\Component;

class Lacak extends Component
{
  public $dataAnggota = [], $anggota, $data, $koordinat;

  public function mount()
  {
    $this->koordinat = collect([])->toJson();
    $this->dataAnggota = Anggota::all();
  }

  public function updatedAnggota()
  {
    $this->data = Anggota::with('pelacakan')->with('kehadiran')->findOrFail($this->anggota);
    $this->koordinat = json_decode($this->data->pelacakan->map(function ($q) {
      return ['lat' => (float) $q->lat, 'lng' => (float) $q->long];
    }));
    $this->emit('koordinat', $this->koordinat);
  }

  public function render()
  {
    return view('livewire.lacak');
  }
}
