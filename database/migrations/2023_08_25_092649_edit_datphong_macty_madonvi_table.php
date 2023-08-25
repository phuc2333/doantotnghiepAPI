<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            DB::statement("ALTER TABLE `datphong` CHANGE COLUMN `Ma_CTy` `Ma_CTy` INT UNSIGNED  NULL");
            DB::statement("ALTER TABLE `datphong` CHANGE COLUMN `Ma_Dvi` `Ma_Dvi` INT UNSIGNED  NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
