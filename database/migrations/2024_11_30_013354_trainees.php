<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->id('id');
            $table->string('username')->unique();  // Unique username
            $table->string('password');  // Required password
            $table->string('email')->unique();  // Required, must be unique
            $table->string('phone');  // Required phone number
            $table->string('first_name');  // Required first name
            $table->string('last_name');  // Required last name
            $table->string('gender');  // Required gender
            $table->integer('age');  // Required age
            $table->decimal('height', 5, 2);  // Required height
            $table->decimal('weight', 5, 2);  // Required weight
            $table->string('address');  // Required address
            $table->text('medical_history')->nullable();  // Nullable, optional medical history
            // Nullable package_id, foreign key referencing packages
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('packageID')->on('packages')->onDelete('set null');  // On delete set null
            $table->text('messages')->nullable();  // Nullable messages
            $table->timestamps();  // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainees');
    }
};
