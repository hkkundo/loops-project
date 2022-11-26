<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = array(
            [
                'name' => 'Administrator',
                'prefix' => 'administrator',
            ],
            [
                'name' => 'User',
                'prefix' => 'user',
            ]
        );

        foreach ($datas as $data) {
            Role::firstOrCreate([
                'prefix' => $data['prefix']
            ], [
                'name' => $data['name'],
                'prefix' => $data['prefix'],
            ]);
        }
    }
}
