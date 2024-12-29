<?php

use App\Models\Product;
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
        Schema::create('product_link', function (Blueprint $table) {
            $table->foreignIdFor(Product::class)->constrained();
            $table->foreignId('product_link_id')->constrained('products');

            $table->primary(['product_id', 'product_link_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_link');
    }
};