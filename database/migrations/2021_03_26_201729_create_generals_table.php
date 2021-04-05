<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // creates a database table named generals
     public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->char('website_title', 200);
            $table->string('logo');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // drops the database table named generals
     public function down()
    {
        Schema::dropIfExists('generals');
    }
}
