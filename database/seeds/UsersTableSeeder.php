<?php

use Illuminate\Database\Seeder;
use App\Users\Domain\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);
        // give the user role admin
        $admin->roles()->sync([1]);
    }
}
