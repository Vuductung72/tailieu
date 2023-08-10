<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rule::insert([
            ['name'=>'Giới thiệu','slug'=>'gioi-thieu', 'type'=>'1', 'content'=>'<p>Giới thiệu</p>'],
            ['name'=>'Điều khoản dịch vụ','slug'=>'dieu-khoan-dich-vu', 'type'=>'2', 'content'=>'<p>Điều khoản dịch vụ</p>'],
        ]);
    }
}
