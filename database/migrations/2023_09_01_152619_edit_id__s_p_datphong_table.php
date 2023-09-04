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
        Schema::table('datphong', function (Blueprint $table) {
            DB::statement("ALTER TABLE `datphong` CHANGE COLUMN `id_SP` `id_SP` INT UNSIGNED  NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datphong', function (Blueprint $table) {
            $table->integer('id_SP')->change();
        });
    }
};
