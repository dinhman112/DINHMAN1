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
        Schema::create('ProductMaigrate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_product');
            $table->string('slug');
            $table->integer('price');
            $table->string('warranty');
            $table->string('img');
            $table->string('accessories');
            $table->string('condition');
            $table->string('promotion');
            $table->tinyInteger('status');
            $table->text('description');
            $table->tinyInteger('featured');

            $table->integer('id_cate')->unsigned();  // unsigned la buoc no la so nguyen
            $table->foreign('id_cate')  // id_cate này làm khóa phụ của bảng
                ->references('id') // references sẽ liên kết với bảng table_category
                ->on('table_category')
                ->onDelete('cascade');  // Khi ta xoa phan danh muc do di thi co san pham nay trong danh muc se bi xoa di
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
        Schema::dropIfExists('ProductMaigrate');
    }
};
