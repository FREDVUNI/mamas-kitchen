<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('category_id');
            $table->string("name");
            $table->longtext("description");
            $table->integer("price");
            $table->string("image");
            $table->string("slug");
            $table->timestamps();

            $table->foreign("category_id")
            ->references("id")
            ->on("categories")
            ->onDelete("cascade");
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
