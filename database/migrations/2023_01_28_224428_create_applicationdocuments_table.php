<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationdocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicationdocuments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('application_id');
            $table->smallInteger('batch');
            $table->foreignId('documentobservationrisk_id');
            $table->foreignId('documentprojectrisk_id');
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
        Schema::dropIfExists('applicationdocuments');
    }
}
