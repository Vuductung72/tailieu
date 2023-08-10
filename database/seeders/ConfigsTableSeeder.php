<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Config;
class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::insert([
            ['key'=>'zalo','value'=>''],
            ['key'=>'facebook','value'=>''],
            ['key'=>'mail','value'=>''],
            ['key'=>'so_dien_thoai','value'=>''],
        ]);
    }
}
