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
            $table->foreignId('batch_id');
            $table->string('documentobservationrisk_ids');
            $table->string('documentprojectrisk_ids');
            $table->text('surveyresult');
            $table->text('plantodo');
            $table->string('surveyresult_image')->nullable();
            $table->string('pentestresult_image')->nullable();
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
