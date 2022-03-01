<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('buyer_informaion_id');
            $table->date('order_date');
            $table->boolean('status')
            ->default(0)
            ->comment('status: (0: đã tạo đơn hàng và chưa thanh toán; 1: đã tạo đơn và đã thanh toán online; 2: (shipping) shipper đang đi giao hàng; 3: (cancel) đơn hàng bị hủy do lỗi kỹ thuật hoặc một lý do khác; 4: (finished) Hoàn thành)');  
            $table->dateTime('create_at');
            $table->dateTime('update_at');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('buyer_informaion_id')->references('id')->on('buyer_informations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}