<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('menu_categories', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable();
        });

        Schema::table('menu_subcategories', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_categories_and_subcategories', function (Blueprint $table) {
            //
        });
    }
};
