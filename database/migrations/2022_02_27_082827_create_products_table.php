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
            $table->string('code');
            $table->string('slug');
            $table->string('thumbnail')->nullable()->comment('Image for post');
            $table->longText('description');
            $table->longText('content');
            $table->double('money');
            $table->boolean('status')->default(0)
            ->comment('status: 0-not process, 1-resolved');
            $table->integer('quantity');
            $table->boolean('is_feature'); //tiêu chí chọn sản phẩm nổi bạt
            $table->unsignedBigInteger('category_id');
            $table->dateTime('create_at');
            $table->dateTime('update_at');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
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
