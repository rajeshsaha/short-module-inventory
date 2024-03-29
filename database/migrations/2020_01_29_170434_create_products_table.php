<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
	        $table->bigIncrements('id');
	        $table->unsignedBigInteger('supplier_id');
	        $table->string('name');
	        $table->text('description');
	        $table->string('photo')->nullable();
	        $table->float('price');
	        $table->unsignedMediumInteger('quantity');
	        $table->unsignedInteger('add_by')->nullable();
	        $table->unsignedInteger('mod_by')->nullable();
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
