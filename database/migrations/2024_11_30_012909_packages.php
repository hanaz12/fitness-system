<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id('packageID');
            $table->string('packageName');
            $table->text('description');  // تعديل من 'discribtion' إلى 'description' لضبط الاسم
            $table->integer('price');
            $table->integer('duration');  // Duration in months or days based on your requirement
            // إضافة عمود admin_id كـ foreign key
            $table->unsignedBigInteger('admin_id')->nullable();  // refer to the admin who manages the package
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null'); // تعيين null في حالة حذف الـ admin
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
