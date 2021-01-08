<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovelCategoriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('novel_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('category_thumbnail')->nullable();
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
        Schema::dropIfExists('novel_categories');
    }
}
