<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payment_apis', function (Blueprint $table) {
            $table->id();
            $table->string('provider_name');
            $table->string('provider_slug');
            $table->string('api_key')->nullable();
            $table->string('secret_key')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_apis');
    }
};
