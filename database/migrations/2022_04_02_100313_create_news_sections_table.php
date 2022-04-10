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
        Schema::create('news_sections', function (Blueprint $table) {
            $table->id();
            $table->string('left_title');
            $table->string('left_sub_title');
            $table->string('left_button_name');
            $table->string('left_button_image');
            $table->string('left_button_url')->nullable();
            $table->string('right_side_image');
            $table->string('right_side_title');
            $table->string('right_side_sub_title');
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
        Schema::dropIfExists('news_sections');
    }
};
