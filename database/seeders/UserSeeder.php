<?php
namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Bussniess;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

$bussniess=Bussniess::create([
    'name' => "demo",

    'country' => "demo_country",
    'state' =>"demo_state",
    'city' => "demo_city",
    'zip_code' => "zip",
    'landmark' => "landmark",

]);
$superadminRole = Role::create(['name'=>'super_admin','bussniess_id'=>1]);
$adminRole = Role::create(['name'=>'admin','bussniess_id'=>1]);



        DB::table("users")->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin12'),
            'role_id' => $superadminRole->id,
            'bussniess_id' => 1
        ]);
    }
}
