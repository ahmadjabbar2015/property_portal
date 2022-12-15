<?php
namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;


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
$superadminRole = Role::create(['name'=>'super_admin']);
$adminRole = Role::create(['name'=>'admin']);



        DB::table("users")->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin12'),
            'role_id' => $superadminRole->id,
        ]);
    }
}
