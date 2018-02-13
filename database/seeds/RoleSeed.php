<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Administrator','description' => 'Can make anything'],
            ['id' => 2, 'name' => 'Simple user','description' => 'nimic special'],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
