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
        Schema::table('apart_contents', function (Blueprint $table) {
            $table->string('name_en')->nullable();
            $table->string('desc')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apart_contents', function (Blueprint $table) {
            $table->dropColumn('name_en');
            $table->dropColumn('desc');

        });
    }
};
