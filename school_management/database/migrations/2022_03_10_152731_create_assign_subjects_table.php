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
        Schema::create('assign_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('class_name_id');
            $table->integer('subject_id');
            $table->integer('group_id')->nullable();
            $table->double('subjective');
            $table->double('subjective_pass_mark');
            $table->double('objective')->nullable();
            $table->double('objective_pass_mark')->nullable();
            $table->double('full_mark');
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
        Schema::dropIfExists('assign_subjects');
    }
};
