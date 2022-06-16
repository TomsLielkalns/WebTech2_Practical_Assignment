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
        Schema::create('specifics', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->timestamps();
			$table->string('species',50)->unique;
			$table->string('color',10);
			$table->string('bloom_season',50);
			$table->integer('lenght_mm');
			$table->string('other', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specifics');
    }
};
