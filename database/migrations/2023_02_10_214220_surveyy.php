<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Surveyy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('surveys');
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id');
            $table->foreignId('respondent_id');
            for ($i = 1; $i <= 20; $i++) {
                $table->char("ans$i", 2)->nullable();
            }
            $table->text('idea')->nullable();
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
        //
    }
}
