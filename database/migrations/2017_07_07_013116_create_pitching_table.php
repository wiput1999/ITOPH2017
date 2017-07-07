<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitchingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitching', function (Blueprint $table) {
            $table->increments('id');
            $table->text('team_name');
            $table->text('member'); // Collect in JSON
            $table->text('school');
            $table->text('teacher_prefix');
            $table->text('teacher_name');
            $table->text('teacher_surname');
            $table->text('teacher_phone');
            $table->text('teacher_email');
            $table->text('idea');
            $table->text('idea_desc');
            $table->text('bizcanvas');
            $table->text('storyboard');
            $table->text('remember');
            $table->tinyInteger('confirm');
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
        Schema::drop('pitching');
    }
}
