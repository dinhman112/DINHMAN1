<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Table_Check_Carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mail');
            $table->string('phone');
            $table->string('address');
            $table->string('status')->default(0);
            
            $table->string('name_prd');
            $table->bigInteger('price_prd');
            $table->bigInteger('quanity_prd');
            $table->string('img_prd');
            $table->integer('total_prd');

            $table->integer('id_prd')->unsigned();
            $table->integer('id_user')->unsigned();

            $table->foreign('id_prd')
            ->references('id')
            ->on('ProductMaigrate')
            ->onDelete('cascade');
            
            $table->foreign('id_user')
            ->references('id')
            ->on('table_user')
            ->onDelete('cascade');
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
        Schema::dropIfExists('Table_Check_Carts');
    }
};
