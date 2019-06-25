<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenericNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_generics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_generic_name');
            $table->integer('th_class_id')->unsigned();
            $table->timestamps();
            $table->foreign('th_class_id')->references('id')->on('item_th_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generic_names');
    }
}
