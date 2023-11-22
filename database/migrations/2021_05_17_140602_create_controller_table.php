<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControllerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workershighlights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('dtini');
            $table->dateTime('dtfim');
            $table->string('cover');
            $table->text('comments');
            $table->integer('meta');
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
        Schema::dropIfExists('workershighlights');
    }
}
