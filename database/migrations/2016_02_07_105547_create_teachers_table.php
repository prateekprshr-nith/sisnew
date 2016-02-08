<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table)
        {
            $table->string('fId', '20');
            $table->string('fName', '100');
            $table->string('dCode', '10');
            $table->string('email', '50');
            $table->string('phoneNo', '15');
            $table->string('office', '200');
            $table->string('password', '50');
            $table->timestamps();

            // Key constraints
            $table->primary('fId');
            $table->unique(['phoneNo', 'email']);
            $table->foreign('dCode')
                  ->references('dCode')
                  ->on('departments')
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
        Schema::drop('teachers');
    }
}
