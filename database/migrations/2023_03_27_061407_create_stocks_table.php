<?php

use App\Models\Products;
use App\Models\Stocks;
use App\Models\ShoppingCart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')->references('id')->on('products')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('original_price', 12, 2);
            $table->decimal('selling_price', 12, 2);
            $table->boolean('status')->default(1)->comment('0 for Inactive, 1 for Active');
            $table->timestamps();
        });

       

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
