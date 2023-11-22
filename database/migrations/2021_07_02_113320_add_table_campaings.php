<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableCampaings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('campaigns', function (Blueprint $table) {
                    $table->id();
                    $table->string('title');
                    $table->dateTime('dtini');
                    $table->dateTime('dtfim');
                    $table->string('cover');
                    $table->text('description');
                    $table->string('category');
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
