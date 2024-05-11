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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('surname', 100);
            $table->string('patronymic', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 100);
            $table->string('password', 100);
            $table->string('document',100);
            $table->string('title',100);
            $table->string('img',100);
            $table->foreignId('id_categoriesCafe')->references('id')->on('categories_cafe')->onDelete('cascade');
            $table->text('location');
            $table->foreignId('id_status')->references('id')->on('applestatuses');
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
        Schema::dropIfExists('applications');
    }
};
