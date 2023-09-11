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
        Schema::table('portfolio_boxes', function (Blueprint $table) {
            $table -> text('header');
            $table->text('desc');
            $table->text('rows');
            $table->string('banner_image');
            $table->string('banner_header');
            $table->string('banner_desc');
            $table->string('banner_detail');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolio_boxes', function (Blueprint $table) {
            //
        });
    }
};
