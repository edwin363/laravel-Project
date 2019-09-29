<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('information', 200)->nullable();
            $table->unsignedBigInteger('territory_id');
            $table->foreign('territory_id')->references('id')->on('territories');
            $table->unsignedBigInteger('scholarship_type_id');
            $table->foreign('scholarship_type_id')->references('id')->on('scholarships_type');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id')->references('id')->on('universities');
            $table->unsignedBigInteger('career_id');
            $table->foreign('career_id')->references('id')->on('careers');
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
        Schema::dropIfExists('scholarships_detail');
    }
}
