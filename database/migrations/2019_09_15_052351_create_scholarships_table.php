<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 30);
            $table->unsignedBigInteger('requirements_id');
            $table->foreign('requirements_id')->references('id')->on('requirements');
            $table->unsignedBigInteger('scholarship_detail_id');
            $table->foreign('scholarship_detail_id')->references('id')->on('scholarships_detail');
            $table->string('state', 20);
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->integer('quotas');
            $table->unsignedBigInteger('scholar_id');
            $table->foreign('scholar_id')->references('id')->on('users');
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
        Schema::dropIfExists('scholarships');
    }
}
