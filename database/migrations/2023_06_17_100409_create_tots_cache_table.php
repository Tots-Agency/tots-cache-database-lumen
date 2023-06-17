<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tots_cache', function (Blueprint $table) {
            $table->id();
            $table->string('key_name', 150)->nullable(false)->unique();
            $table->json('data')->nullable(true);
            $table->dateTime('expires_at')->nullable(false)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tots_cache');
    }
};
