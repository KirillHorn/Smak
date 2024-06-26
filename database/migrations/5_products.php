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
        Schema::create('products',function(Blueprint $table) {
 $table->id();
 $table->string('title',100);
 $table->text('description');
 $table->float('weight');
 $table->float('cost');
 $table->string('img',100 );
 $table->integer('rating_product'); 
 $table->foreignId('id_categories')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
};
