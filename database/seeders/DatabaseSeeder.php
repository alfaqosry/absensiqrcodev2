<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'                  => 'Root Administrator',

            'email'                 => 'admin@admin.com',
            'password'              => bcrypt('12345678'),
            'role'                  => 'Sekdes'
        ]);

        \App\Models\Qrtoken::create([
            'id'                  => 1,

            'token'                 => '123456789',
           
        ]);
           
    }
}
