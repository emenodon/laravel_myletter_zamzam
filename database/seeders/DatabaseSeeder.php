<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('jabatans')->insert(
            [
                'jabatan_name' => 'admin',
            ]
        );
        DB::table('jabatans')->insert(
            [
                'jabatan_name' => 'user',
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@ad.min',
                'nama_lengkap' => 'adminodon',
                'password' => Hash::make('adminnnn'),
                'jabatan_id' => '1'
            ]
        );
    }
}
