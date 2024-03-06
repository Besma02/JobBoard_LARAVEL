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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_type');
            $table->string('job_region');
            $table->string('company');
            $table->string('vacancy');
            $table->string('experience');
            $table->string('salary');
            $table->string('gender');
            $table->date('application_deadline');
            $table->text('jobDescription');
            $table->text('responsablities');
            $table->text('education_experience');
            $table->text('otherBenifits');
            $table->string('image');
            

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
        Schema::dropIfExists('jobs');
    }
};
