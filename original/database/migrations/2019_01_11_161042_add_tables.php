<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('visits', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('website_id');
            $table->string('browser');
            $table->string('os');
            $table->string('country');
            $table->string('ip', 15);
            $table->timestamp('visited_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
        Schema::dropIfExists('visits');
    }
}
