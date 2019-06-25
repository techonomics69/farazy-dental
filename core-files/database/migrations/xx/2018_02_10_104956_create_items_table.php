<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->integer('item_generic_id')->unsigned()->nullable();
            $table->integer('item_group_id')->unsigned()->nullable();
            $table->integer('item_party_id')->unsigned()->nullable();
            $table->integer('item_type_id')->unsigned()->nullable();
            $table->string('item_strength')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('item_generic_id')->references('id')->on('item_generics');
            $table->foreign('item_group_id')->references('id')->on('item_groups');
            $table->foreign('item_party_id')->references('id')->on('parties');
            $table->foreign('item_type_id')->references('id')->on('item_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
