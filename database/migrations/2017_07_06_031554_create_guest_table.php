<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest', function (Blueprint $table) {
            $table->increments('id');
            $table->text('prefix');
            $table->text('name');
            $table->text('surname');
            $table->enum('gender',['M', 'F', 'U']);
            $table->tinyInteger('age')->nullable();
            $table->text('career');
            $table->text('province')->nullable();
            $table->text('phone')->nullable();
            $table->text('email');
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->tinyInteger('news')->default(0);
            $table->text('workshop');
            $table->timestamp('confirm')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE guest CHANGE id id INT(4) UNSIGNED ZEROFILL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guest');
    }
}
