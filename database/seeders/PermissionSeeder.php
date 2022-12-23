<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("Permissions")->insert([
['name' => 'Tenants',],
['name' => 'Landlords',],
['name' => 'Property',],
['name' => 'Property Units',],
['name' => 'Leases',],
['name' => 'Inventory',],
['name' => 'Events',],
['name' => 'Tickets',],
['name' => 'Agent',],
['name' => 'Lead',],
['name' => 'Customer',],
['name' => 'Add property Type',],
['name' => 'Source',],
['name' => 'Role',],
['name' => 'Reports',],
['name' => 'Users'],



        ]);
        $permission_id=DB::table("Permissions")->get();

        foreach ($permission_id as  $value) {
            DB::table("permission_role")->insert([
               [ 'role_id' =>1,
               'bussniess_id' =>1,
                'permission_id' => $value->id,
                'can_view' => 1,

                'can_create' => 1,
                'can_delete' => 1,
                'can_update' => 1,],
                [ 'role_id' =>2,
                'bussniess_id' =>1,
                'permission_id' => $value->id,
                'can_view' => 1,

                'can_create' => 1,
                'can_delete' => 1,
                'can_update' => 1,],

            ]);
        }
    }
}
