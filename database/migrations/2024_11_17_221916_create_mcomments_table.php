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
        Schema::create('mcomments', function (Blueprint $table) {
            $table->id();
            $table->string('user_ip');
            $table->unsignedBigInteger('post_id');
            $table->string('comment');
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('music')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcomments');
    }
};
