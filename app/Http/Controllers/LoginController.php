<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
  //
  public function index(Request $req)
  {
    $param = $req->json()->all();
    $rules = [
      'uid' => 'required',
      'waktu' => 'required',
    ];
    $validator = Validator::make($param, $rules);

    if ($validator->passes()) {
      $anggota = Anggota::where('uid', $param['uid'])->first();

      $data = new Kehadiran();
      $data->anggota_id = $anggota->getKey();
      $data->waktu = $req->waktu;
      $data->status = 'in';
      $data->save();

      return response()->json([
        'code' => 200,
        'status' => 'success',
        'data' => [
          'id' => $anggota->getKey(),
          'nama' => $anggota->nama,
        ],
      ], 200);
    } else {
      return response()->json([
        'code' => 400,
        'status' => 'failed',
        'data' => $validator->errors()->all(),
      ], 400);
    }
  }
}
