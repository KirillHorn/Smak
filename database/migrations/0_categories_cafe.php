<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\categoriesCafe;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("categories_cafe", function (Blueprint $table) {
                $table->id();   
                $table->string('title_categories',100);
                $table->timestamps();
             });

             Artisan::call('db:seed', ['--class'=>categoriesCafe::class]);
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_cafe');
    }
};
