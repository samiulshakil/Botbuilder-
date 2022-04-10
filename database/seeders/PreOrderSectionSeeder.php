<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PreOrderSection;

class PreOrderSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PreOrderSection::create([
            'pre_order_bg' => 'uploads/pre_order_section/preorder.jpg',
            'pre_order_card_image' => 'uploads/pre_order_section/card.jpg',
            'pre_order_title' => 'pre order title',
            'pre_order_description' => 'pre order description',
            'button_image' => 'uploads/pre_order_section/button.jpg',
            'button_text' => 'button text',
            'button_url' => 'button url',
        ]);
    }
}
