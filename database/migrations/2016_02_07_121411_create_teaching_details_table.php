<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachingDetails', function (Blueprint $table)
        {
            $table->string('courseCode', '10');
            $table->string('fId', '20');
            $table->decimal('lecturesHeld', '2');
            $table->timestamps();

            // Key constraints
            $table->primary('courseCode');
            $table->foreign('fId')
                  ->references('fId')
                  ->on('teachers')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('courseCode')
                  ->references('courseCode')
                  ->on('courses')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachingDetails');
    }
}
