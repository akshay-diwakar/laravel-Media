<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;
use DB;


class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $Role = role::factory()->create();
        DB::table('users_roles')->insert(
            [
                [
                    'user_id' => '1',
                    'role_id' => '1',
                ],
            ]);

    }
}
