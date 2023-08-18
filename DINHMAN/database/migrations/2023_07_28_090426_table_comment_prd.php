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
        Schema::create('table_commnet_prd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('name');
            $table->string('comments');
            
            $table->integer('id_prd_com')->unsigned();// Làm khóa phụ cho bảng comments // unsigned ràng buộc phải là số nguyên.
            $table->foreign('id_prd_com')  
                ->references('id') ///  liên kết với id chính của sản phẩm
                ->on('ProductMaigrate')
                ->onDelete('cascade');  // rang buoc noi voi bang san pham nếu xóa sản phầm thì bình luận đó sẽ xóa luôn.
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
        Schema::dropIfExists('table_commnet_prd');
    }
};
