<?php

use Illuminate\Database\Seeder;
use App\Users\Domain\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'slug' => 'admin',
            'name' => 'administrator',
            'permissions' => [
                'create-user' => true,
                'block-user' => true,
                'update-user' => true,
                'delete-user' => true,
            ],
        ]);
        Role::create([
            'slug' => 'creator',
            'name' => 'creator',
            'permissions' => [
                'create-content' => true,
                'update-content' => true,
                'delete-content' => true,
            ],
        ]);
        Role::create([
            'name' => 'user',
            'slug' => 'user',
            'permissions' => [
                'view-post' => true,
                'share-post' => false,
                'comment-post' => false,
            ],
        ]);
    }
}
