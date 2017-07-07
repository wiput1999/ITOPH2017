<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEsportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esport', function (Blueprint $table) {
            $table->increments('id');
            $table->text('team_name');
            $table->text('team_fb');
            $table->text('member'); // Collect in JSON
            $table->text('school');
            $table->text('school_addr');
            $table->text('school_province');
            $table->text('teacher_prefix');
            $table->text('teacher_name');
            $table->text('teacher_surname');
            $table->text('teacher_phone');
            $table->text('teacher_email');
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
        Schema::drop('esport');
    }
}
