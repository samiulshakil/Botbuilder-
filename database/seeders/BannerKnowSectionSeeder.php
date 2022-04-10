<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BannerKnowSection;

class BannerKnowSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BannerKnowSection::create([
            'banner_bg_image' => 'uploads/banner_know_section/banner.jpg',
            'know_title' => 'title',
            'know_subtitle' => 'subtitle',

            'know_description' => '<p class="know__text">
            On his own for the first time. Mars the Smoke-Bot divides his time between school and hustling to pay for his busines Degree. But when he tuns into a stopping poin, Mars goes into the <span class="primary-text">“Natural  Medication game.” ‘’District 420”</span> is a dealer - simulator game where you single-handedly transform <br>
            into the world’s largest transporter of marijuana and change the course of an entire school, community, and world.
            </p>
            <p class="know__text">
                <span class="primary-text">“District 420”</span> game will be introduced like episoded of a television show. Each week, an expansion of the game will be added, which allows for all users to have a fair shot at earning <span class="primary-text">“NFT BUDS”</span> or a <span class="primary-text">“Smoke-Bot NFT.”</span> Within the game, you wil have the option to generate your buds into an “NFT BUD” or you can leave it in-game to sell to students on campus for “smokeSwap” coins.</p>',
            
            'know_image' => 'uploads/banner_know_section/default.jpg',
        ]);
    }
}
