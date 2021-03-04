<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->enum('status', ['instock', 'outofstock', 'draft', 'publish', 'trash'])->default('draft');
            $table->integer('quantity')->default(0);
            $table->float('price')->default(0);
            $table->json('categories')->nullable();
            $table->json('brands')->nullable();
            $table->json('tags')->nullable();
            $table->json('reviews')->nullable();
            $table->string('banner')->nullable();
            $table->json('images')->nullable();
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
}
