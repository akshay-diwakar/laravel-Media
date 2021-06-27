<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\role;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $Role = role::factory()->create();
        DB::table('roles')->insert(
            [
                [
                    'name' => 'Admin',
                ],
                [
                    'name' => 'User',
                ],
                [
                    'name' => 'Editor',
                ],
            ]);
    }
}
