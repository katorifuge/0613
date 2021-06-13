<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => 'ダミー内容',
            'created_at' => '2021-06-13 00:00:00',
        ];
        DB::table('todos')->insert($param);
    }
}

