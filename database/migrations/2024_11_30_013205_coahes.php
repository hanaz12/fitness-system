<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();  // Email must be unique
            $table->string('password');
            $table->string('userName')->unique();  // userName must be unique
            $table->string('phone');
            $table->string('address');
            // إضافة عمود admin_id كـ foreign key
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null'); // On delete set null
            // إضافة عمود package_id كـ foreign key
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('packageID')->on('packages')->onDelete('set null'); // On delete set null
            // إضافة عمود salary
            $table->decimal('salary', 8, 2); // الرقم الذي سيتم دفعه للمدرب
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coaches');
    }
};
