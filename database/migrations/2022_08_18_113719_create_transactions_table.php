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
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->morphs('transactionable');
            $table->enum('type', ['P','E','R','W']);
            $table->tinyText('description');
            $table->integer('amount');
            $table->integer('before');
            $table->integer('after');
            $table->date('displays_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
