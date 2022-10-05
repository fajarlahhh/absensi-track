<?php

namespace App\Http\Controllers;

use App\Models\Pelacakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KoordinatController extends Controller
{
  //

  public function index(Request $req)
  {
    $param = $req->json()->all();
    $rules = [
      'anggotaId' => 'required',
      'long' => 'required',
      'lat' => 'required',
    ];
    $validator = Validator::make($param, $rules);

    if ($validator->passes()) {
      $data = new Pelacakan();
      $data->anggota_id = $param['anggotaId'];
      $data->long = $param['long'];
      $data->lat = $param['lat'];
      $data->save();

      return response()->json([
        'code' => 200,
        'status' => 'success',
        'data' => [],
      ]);
    } else {
      return response()->json([
        'code' => 200,
        'status' => 'success',
        'data' => $validator->errors()->all(),
      ]);
    }
  }
}
