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
            $table->foreignId('category_id')->nullable()
            ->constrained('categories')
            ->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()
            ->constrained('brands')
            ->onDelete('cascade');
            $table->string('name', 100);
            $table->string('slug');
            $table->decimal('price')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_new')->nullable();
            $table->boolean('feature')->nullable();
            $table->string('image');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('ip_address')->nullable();
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
