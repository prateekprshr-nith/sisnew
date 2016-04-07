<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAssignmentsTable, this class
 * creates assignments database table
 */
class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table)
        {
            $table->string('courseCode', '10');
            $table->integer('number');
            $table->string('title', '50');
            $table->string('description', '1000');
            $table->date('dueDate');
            $table->timestamps();

            // Key constraints
            $table->primary(['courseCode', 'number']);
            $table->foreign('courseCode')
                ->references('courseCode')
                ->on('teachingDetails')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assignments');
    }
}
