<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nomor_rekening');
            $table->timestamps();
        });

        DB::table('banks')->insert(
            [
                ['nama' => 'Bank BRI Housemate Q', 'nomor_rekening' => '0011223344556677'],
                ['nama' => 'Bank BCA Housemate Q', 'nomor_rekening' => '0044454223256474'],
                ['nama' => 'Bank BNI Housemate Q', 'nomor_rekening' => '0022366667896422']
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank');
    }
}
