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
            $table->bigInteger('cat_id');
            $table->bigInteger('subcat_id');
            $table->bigInteger('brand_id')->unsigned();
            $table->string('name');
            $table->string('slug',191)->unique();
            $table->string('model')->nullable();
            $table->decimal('buying_price', 10, 2);
            $table->decimal('selling_price', 10, 2);
            $table->decimal('special_price', 10, 2)->nullable();
            $table->date('special_start')->nullable();
            $table->date('special_end')->nullable();
            $table->integer('quantity');
            $table->string('thumbnail');
            $table->text('description');
            $table->longText('long_description')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('feature_products')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();


            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete();
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
