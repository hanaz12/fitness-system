<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();  // الـ ID الأساسي
            $table->string('name');
            $table->string('email')->unique();  // البريد الإلكتروني يجب أن يكون فريدًا
            $table->string('password');
            $table->string('userName')->unique();  // اسم المستخدم يجب أن يكون فريدًا
            $table->integer('phone');
            $table->string('address');
            // إضافة عمود admin_moderator_id كـ foreign key مع onDelete('set null')
            $table->unsignedBigInteger('admin_moderator_id')->nullable();  // nullable for when set null
            $table->foreign('admin_moderator_id')
                ->references('id')->on('admin_moderators')
                ->onDelete('set null');  // عندما يتم حذف الـ admin_moderator يتم تعيين null
            // إضافة عمود salary لتخزين الراتب
            $table->decimal('salary', 10, 2)->nullable();  // الراتب مع 10 أرقام و 2 خانة عشرية
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
