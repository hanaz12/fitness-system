<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admin_moderators', function (Blueprint $table) {
            $table->id('id');  // Primary key for admin moderator
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();  // email must be unique
            $table->string('password');
            $table->string('userName')->unique();  // userName must be unique
            $table->integer('phone');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_moderators');
    }
};
