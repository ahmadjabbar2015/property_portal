<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Bussniess;

class BussniessController extends Controller
{

    public function create()
    {
        return view('bussniess.create');
    }
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $bussniess_regirester = [
                'name' => $request->name,
                'date' => $request->date,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'landmark' => $request->landmark,
                'logo' => $request->logo,

            ];
            $logo = $request->logo;
            if ($request->hasfile('logo')) {


                $file = $request->file('logo');
                $extention = $file->getClientoriginalExtension();
                $filename = time() . '.' . $extention;

                $data = $file->move(public_path('/assets/img'), $filename);
                $logo = $filename;
            }
            $bussniess_regirester['logo'] = $logo;

            $bussniess_details = Bussniess::create($bussniess_regirester);

            $users = DB::table("users")->insert([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2,
                'bussniess_id' => $bussniess_details->id

            ]);
            DB::commit();
            return redirect(route('login'))->with('success', 'Bussniess Addedd!');
        } catch (\Throwable $th) {
            DB::rollBack();
            $flas_message =  toastr()->error('something went wrong');

            return redirect()->back()->with('flas_message');
        }
    }
}
