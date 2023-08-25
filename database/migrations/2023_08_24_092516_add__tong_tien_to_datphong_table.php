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
            // add new columns
            $table->string('TongTien'); 
            $table->string('SoLuongSanPham');
            $table->string('Ghichu');
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
            //
        });
    }
};
