<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogoutController extends Controller
{
  //
  public function index(Request $req)
  {
    $param = $req->json()->all();
    $rules = [
      'anggotaId' => 'required',
    ];
    $validator = Validator::make($param, $rules);

    if ($validator->passes()) {
      $data = new Kehadiran();
      $data->anggota_id = $param['anggotaId'];
      $data->status = 'out';
      $data->save();

      return response()->json([
        'code' => 200,
        'status' => 'success',
        'data' => [],
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
