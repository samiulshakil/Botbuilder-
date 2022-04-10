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
        Schema::create('pre_order_sections', function (Blueprint $table) {
            $table->id();
            $table->string('pre_order_bg');
            $table->string('pre_order_card_image');
            $table->string('pre_order_title');
            $table->longText('pre_order_description');
            $table->string('button_image');
            $table->string('button_text');
            $table->string('button_url'); 
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
        Schema::dropIfExists('pre_order_sections');
    }
};
