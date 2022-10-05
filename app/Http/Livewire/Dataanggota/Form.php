<?php

namespace App\Http\Livewire\Dataanggota;

use App\Models\Anggota;
use Livewire\Component;

class Form extends Component
{
  public $nama, $uid;

  public function submit()
  {
    $data = new Anggota();
    $data->nama = $this->nama;
    $data->uid = $this->uid;
    $data->save();

    return redirect('/dataanggota');
  }

  public function render()
  {
    return view('livewire.dataanggota.form');
  }
}
