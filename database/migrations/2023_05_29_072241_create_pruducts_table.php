<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pruducts', function (Blueprint $table) {
            $urlGambar = "https://upload.jaknot.com/2023/03/images/products/d847c6/original/skmei-jam-tangan-kasual-digital-analog-pria-1389.jpg";
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_image')->default($urlGambar);
            $table->integer('price')->nullable();
            $table->integer('qty')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pruducts');
    }
};
