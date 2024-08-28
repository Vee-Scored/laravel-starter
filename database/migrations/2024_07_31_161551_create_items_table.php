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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->integer('Stock');
            $table->integer('Price');
            $table->text('Description');

            $table->enum("status",['available','unavailable'])->default("available");
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references('id')->on('categories')->onDelete("cascade");
            $table->string("Image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
