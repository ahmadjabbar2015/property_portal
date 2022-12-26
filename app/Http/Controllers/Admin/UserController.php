<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use DataTables;
use DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->hasPermission('Users','view')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $data=User::with('role_Id')->whereNotIn('id',['1'])->where('bussniess_id',$bussniess_id)->get();


        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('role', function ($row) {
                $roleassign=$row->role_Id->name;
                return $roleassign;
                })
                ->addColumn('action', function ($row) {

                    $actionBtn = '
                    <a href="/users/delete/' . $row->id . '"class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                    <a href="/users/edit/' . $row->id . '"class="edit btn btn-success btn-sm"><i class="fa-solid fa-file-pen"></i></a>';
                    return $actionBtn;
                })
                ->addcolumn('date', function ($row) {
                    $data = explode(" ", $row->created_at);
                    $date = $data[0];
                    return $date;
                  })

                ->rawColumns(['action','date','roleassign'])
                ->make(true);
        }


            return view('admin.users.index');
    }
    public function create()
    {
        if (!auth()->user()->hasPermission('Users','create')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $role=Role::whereNotIn('id',['1'])->where('bussniess_id',$bussniess_id)->get();


        return view('admin.users.create',compact('role'));
    }
    public function store(Request $request)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $user =new User;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->password=Hash::make($request->password);
        $user->role_id=$request->role_id;
        $user->email=$request->email;
        $user->gender=$request->gender;
        $user->address=$request->address;
        $user->number=$request->number;
        $user->city=$request->city;
        $user->ZIP=$request->ZIP;
        $user->bussniess_id=$bussniess_id;
        $user->save();
        $flas_message =  toastr()->success('Users Created Successfully');
        return redirect(route('users.index'))->with('flas_message');
    }
    public function edit($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $role=Role::whereNotIn('id',['1'])->where('bussniess_id',$bussniess_id)->get();


       $user=User::with('role_Id')->where('bussniess_id',$bussniess_id)->find($id);

       return view('admin.users.edit',compact('user','role'));
    }
    public function update(Request $request,$id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        User::where('id', $id)->where('bussniess_id',$bussniess_id)
       ->update([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'password' => Hash::make($request->password),
           'role_id' => $request->role_id,
           'email' => $request->email,
           'address' => $request->address,
           'gender' => $request->gender,
           'number' => $request->number,
           'city' => $request->city,
           'ZIP' => $request->ZIP,
        ]);


        $flas_message =  toastr()->success('User Updated Successfully');

        return redirect(route('users.index'))->with('flas_message');
    }
    public function checkemail($data)
    {
        $emailcheck=User::where('email',$data)->count();
        if ($emailcheck != 0) {
            return 1;
          } else {
            return 0;
          }
    }
}
