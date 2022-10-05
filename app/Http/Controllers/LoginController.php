<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
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
    ];
    $validator = Validator::make($param, $rules);

    if ($validator->passes()) {
      $data = Anggota::where('uid', $param['uid'])->first();
      return response()->json([
        'code' => 200,
        'status' => 'success',
        'data' => [
          'id' => $data->getKey(),
          'nama' => $data->nama,
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
