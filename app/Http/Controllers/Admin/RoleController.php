<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use DataTables;
use DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function show(Request $request)
    {
        if (!auth()->user()->hasPermission('Role','view')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $data=Role::whereNotIn('id',['1'])->where('bussniess_id',$bussniess_id)->get();

        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '
                    <a href="/role/delete/' . $row->id . '"class="delete btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                    <a href="/assign_permission/' . $row->id . '"class="delete btn btn-success btn-sm">AssignPermission</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }



        return view('admin.role.index');
    }
    public function store(Request $request)
    {
        if (!auth()->user()->hasPermission('Role','create')){
            return redirect(route('404'));
        }
        $bussniess_id=auth()->user()->bussniess_id;
        $role = new Role;
        $role->name = $request->name;
        $role->bussniess_id =$bussniess_id;
        $role->save();

        $permission_id=DB::table("Permissions")->get();

        foreach ($permission_id as  $value) {
            DB::table("permission_role")->insert([
                'role_id' =>$role->id,
                'bussniess_id' =>$bussniess_id,
                'permission_id' => $value->id,
                'can_view' => 1,

                'can_create' => 1,
                'can_delete' => 1,
                'can_update' => 1,
            ]);
        }
        $flas_message =  toastr()->success('Role Addedd Successfully');
        return redirect(url('/role/index'));
    }
    public function destroy($id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        DB::table('permission_role')->where('role_id',$id)->where('bussniess_id',$bussniess_id)->delete();
        DB::table('roles')->where('bussniess_id',$bussniess_id)->delete($id);
        $flas_message =  toastr()->success('Source Deleted Successfully');
        return redirect(url('role/index'))->with('flas_message');

    }
    public function assign_permission(Request $request,$id)
    {
        $bussniess_id=auth()->user()->bussniess_id;
        $role_id=$id;
      $permission_data=  DB::table('permission_role')
      ->leftjoin('permissions','permissions.id','=','permission_role.permission_id')
      ->where('role_id',$id)->where('permission_role.bussniess_id',$bussniess_id)->get();


        return view('admin.role.permission',compact('permission_data','role_id'));

    }
    public function permission(Request $request,$id)
    {


        $bussniess_id=auth()->user()->bussniess_id;
        $role_id=$id;

        foreach ($request->permission_id as  $value) {

if (isset($value['show'])) {
    $value['show']=1;

}else {
    $value['show']=0;
}
if (isset($value['create'])) {
    $value['create']=1;

}else {
    $value['create']=0;
}
if (isset($value['delete'])) {
    $value['delete']=1;

}else {
    $value['delete']=0;
}
if (isset($value['update'])) {
    $value['update']=1;

}else {
    $value['update']=0;
}

            DB::table("permission_role")->where('role_id',$id)->where('bussniess_id',$bussniess_id)->where('permission_id',$value['permission_id'])->update([
                'role_id' =>$id,
                'bussniess_id' =>$bussniess_id,
                'permission_id' => $value['permission_id'],
                'can_view' => $value['show'],

                'can_create' => $value['create'],
                'can_delete' => $value['delete'],
                'can_update' => $value['update'],
            ]);

        }

        return redirect(url('role/index'));


    }
}
