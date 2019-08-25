<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateCompetence');
            $table->float('amount');
            $table->string('description', 255);
            $table->integer('person_id');
            $table->foreign('person_id')->references('persons')->on('id');
            $table->integer('category_id');
            $table->foreign('category_id')->references('category')->on('id');
            $table->integer('created_by');
            $table->foreign('created_by')->references('persons')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming');
    }
}
