<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsSection;

class NewsSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsSection::create([
            'left_title' => 'NEWS',
            'left_sub_title' => 'All NFT Bot Builder Updates.',
            'left_button_name' => 'FAQ',
            'left_button_image' => 'button.jpg',
            'right_side_image' => 'news.jpg',
            'right_side_title' => 'Builder Your Custom NFT Smoke Bot Now!!!!',
            'right_side_sub_title' => '10/10/1999',
        ]);
    }
}
