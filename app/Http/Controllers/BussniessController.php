<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Bussniess;

class BussniessController extends Controller
{
    public function create(Type $var = null)
    {
        return view('bussniess.create');
    }
    public function store(Request $request)
    {
        // try{
            DB::beginTransaction();

        $bussniess_regirester=[
             'name' => $request->name,
        'date' => $request->date,
        'country' => $request->country,
        'state' => $request->state,
        'city' => $request->city,
        'zip_code' => $request->zip_code,
        'landmark' => $request->landmark,
        'logo' =>$request->logo,

    ];

    $bussniess_details = Bussniess::create($bussniess_regirester);
    $users=[
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),

    ];
    $bussniess_details = User::create($users);

      dd($bussniess_regirester);
      DB::commit();
    //   return [
    //       'success'   => true,
    //       'message'   => "Property Added Successfully",
    //   ];
    // }catch(Exception $e){
    //     return [
    //         'success'   => false,
    //         'message'   => $e->getMessage(),
    //     ];
    // }
    }
}
