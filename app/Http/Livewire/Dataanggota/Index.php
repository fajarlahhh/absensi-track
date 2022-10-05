<?php

namespace App\Http\Livewire\Dataanggota;

use App\Models\Anggota;
use Livewire\Component;

class Index extends Component
{
  public function hapus($id)
  {
    Anggota::findOrFail($id)->delete();
  }

  public function render()
  {
    return view('livewire.dataanggota.index', [
      'data' => Anggota::all(),
    ]);
  }
}
