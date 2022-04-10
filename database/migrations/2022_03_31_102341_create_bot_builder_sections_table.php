<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bot_builder_sections', function (Blueprint $table) {
            $table->id();
            $table->string('botbuilder_title');
            $table->string('botbuilder_sub_title');
            $table->string('botbuilder_lady_button');
            $table->string('botbuilder_man_button');
            $table->string('botbuilder_button_bg');
            $table->string('botbuilder_smoke_bg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bot_builder_sections');
    }
};
