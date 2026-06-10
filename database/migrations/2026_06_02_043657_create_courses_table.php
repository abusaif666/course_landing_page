<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('video')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->boolean('type');
            $table->boolean('status')->default(1);
            $table->date('offer_start')->nullable();
            $table->date('offer_end')->nullable();
            $table->integer('total_seat')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('drive')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
