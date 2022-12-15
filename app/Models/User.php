<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'email',
        'password',
        'role_id'
    ];
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
      return $this->belongto(Role::class);
    }
    public function permission()
    {
    //   return $this->belongto(Permission::class);
    }
    public function isAdmin(): bool
    {
    return $this->role()->where('name','admin')->exists();
    }
    public function hasrole($name): bool
    {
    return $this->role()->where('name','$name')->exists();
    }

    public function role_Id()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function hasPermission($name,$fun): bool
    {

        $data=Permission::where('name',$name)->first();
        $permission_id=$data->id;
        $role_id = $this->role_id;
        if($fun == 'create'){
            $create_data=DB::table('permission_role')->where('role_id',$role_id)->where('permission_id',$permission_id)
            ->where('can_create','1')->exists();
        return $create_data;
        }else if ($fun == 'view') {
            $view_data=DB::table('permission_role')->where('role_id',$role_id)->where('permission_id',$permission_id)
            ->where('can_view','1')->exists();
        return $view_data;
        }else if($fun == 'update'){
            $update_data=DB::table('permission_role')->where('role_id',$role_id)->where('permission_id',$permission_id)
            ->where('can_update','1')->exists();
        return $update_data;

        }else if($fun == 'delete'){
            $delete_data=DB::table('permission_role')->where('role_id',$role_id)->where('permission_id',$permission_id)
            ->where('can_delete','1')->exists();
            return $delete_data;

        }else{
            return false;
        }




    }
}
