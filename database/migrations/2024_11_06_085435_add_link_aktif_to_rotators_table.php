<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('rotators', function (Blueprint $table) {
            $table->string('link_aktif')->nullable(); // Menambahkan kolom link_aktif sebagai string yang dapat bernilai null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('rotators', function (Blueprint $table) {
            $table->dropColumn('link_aktif'); // Menghapus kolom link_aktif saat rollback
        });
    }
};
