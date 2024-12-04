<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdminsTable extends Migration
{
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            // حذف عمود name
            $table->dropColumn('name');

            // إضافة الأعمدة الجديدة
            $table->string('firstname');
            $table->string('lastname');
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            // استرجاع عمود name
            $table->string('name');

            // إزالة الأعمدة الجديدة
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
        });
    }
}
