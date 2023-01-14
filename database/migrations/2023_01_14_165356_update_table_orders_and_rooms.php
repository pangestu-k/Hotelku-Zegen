<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableOrdersAndRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function ($table) {
            $table->text('desc')->nullable();
        });

        Schema::table('orders', function ($table) {
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function ($table) {
            $table->dropColumn('desc');
        });

        Schema::table('orders', function ($table) {
            $table->dropColumn('image');
        });
    }
}
