<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStudentQueriesTable, this class
 * creates a studentQueries database table
 */
class CreateStudentQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentQueries', function (Blueprint $table) {
            $table->string('rollNo', '20');
            $table->string('courseCode', '10');
            $table->string('description', '1000')->nullable();
            $table->string('response', '1000')->nullable();
            $table->timestamps();

            // Key constraints
            $table->primary(['rollNo', 'courseCode', 'created_at']);
            $table->foreign(['rollNo', 'courseCode'])
                ->references(['rollNo', 'courseCode'])
                ->on('academicRecords')
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
        Schema::drop('studentQueries');
    }
}
