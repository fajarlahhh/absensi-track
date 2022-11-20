<?php

namespace App\Http\Controllers;

use App\Models\Pelacakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KoordinatController extends Controller
{
  //

  public function input(Request $req)
  {
    $validator = Validator::make($req->all(), [
      'anggotaId' => 'required',
      'long' => 'required',
      'lat' => 'required',
    ]);
    if ($validator->fails()) {
      return response()->json([
        'code' => 400,
        'status' => 'failed',
        'data' => $validator->messages(),
      ]);
    }

    try {
      $data = new Pelacakan();
      $data->anggota_id = $req->anggotaId;
      $data->long = $req->long;
      $data->lat = $req->lat;
      $data->save();

      return response()->json([
        'code' => 200,
        'status' => 'success',
        'data' => null,
      ]);
    } catch (\Exception$e) {
      return response()->json([
        'code' => 400,
        'status' => 'failed',
        'data' => $e->getMessage(),
      ]);
    }
  }
}
