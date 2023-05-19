<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    const Users = [
        ['name' => 'ジェイ', 'account' => 'j1028'],
        ['name' => 'なお', 'account' => 'nao0001'],
        ['name' => 'なつき', 'account' => 'natuki001'],
        ['name' => 'はるか', 'account' => 'haruka0001'],
    ];

    const MenuCategories = [
        ['name' => '', 'thumbnail' => '']
    ];

    const Menus = [
        ['name' => '', 'price' => 100, 'thumbnail' => null, 'is_active' => true, 'description' => null]
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (self::Users as $user) {
            User::factory()->create([
                'name' => $user['name'],
                'account' => $user['account'],
            ]);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
