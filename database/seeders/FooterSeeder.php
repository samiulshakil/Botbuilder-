<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Footer;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Footer::create([
            'footer_left_side_logo' => 'logo.jpg',
            'footer_left_side_title' => 'left title',
            'footer_left_side_subtitle' => 'left subtitle',
            'footer_left_side_btn_name' => 'connect',
            'footer_left_side_btn_image' => 'button.jpg',
        ]);
    }
}
