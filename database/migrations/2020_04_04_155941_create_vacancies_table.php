<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('position');
            $table->text('responsibilities');
            $table->text('requirements');
            $table->text('terms');
            $table->bigInteger('min_salary')->nullable();
            $table->bigInteger('max_salary')->nullable();
            $table->string('skills')->nullable();
            $table->unsignedBigInteger('employer_id')->index();
            $table->foreign('employer_id')->references('id')->on('employers');
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
        Schema::dropIfExists('vacancies');
    }
}
