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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->text('excerpt')->nullable();
            $table->text('description');
            $table->string('image');
            $table->string('image_caption')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('users');
            $table->integer('quantity');
            $table->dateTime('m_date');
            $table->dateTime('e_date');
            $table->integer('p_price');
            $table->integer('s_price');
            $table->integer('dis_price');
            $table->boolean('status')->default(1);
            $table->integer('display_order')->nullable();
            $table->boolean('feature')->nullable();
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
