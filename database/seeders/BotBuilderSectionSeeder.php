<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BotBuilderSection;

class BotBuilderSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BotBuilderSection::create([
            'botbuilder_title' => 'DISTRICT 420',
            'botbuilder_sub_title' => 'Build your own NFT Smokebot',
            'botbuilder_lady_button' => 'Man Bot',
            'botbuilder_man_button' => 'Lady Bot',
            'botbuilder_button_bg' => 'button.jpg',
            'botbuilder_smoke_bg' => 'smoke.jpg',
        ]);
    }
}
