<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rotators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('associated_to');
            $table->string('link_1')->nullable();
            $table->string('link_2')->nullable();
            $table->string('link_3')->nullable();
            $table->string('link_4')->nullable();
            $table->string('link_5')->nullable();
            $table->string('link_6')->nullable();
            $table->string('link_7')->nullable();
            $table->string('link_8')->nullable();
            $table->string('link_9')->nullable();
            $table->string('link_10')->nullable();
            $table->string('link_1_status')->nullable();
            $table->string('link_2_status')->nullable();
            $table->string('link_3_status')->nullable();
            $table->string('link_4_status')->nullable();
            $table->string('link_5_status')->nullable();
            $table->string('link_6_status')->nullable();
            $table->string('link_7_status')->nullable();
            $table->string('link_8_status')->nullable();
            $table->string('link_9_status')->nullable();
            $table->string('link_10_status')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rotators');
    }
};
