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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id', 10);
            $table->string('method');
            $table->integer('amount');
            $table->enum('status', ['PENDING','PROCESSING','REFUSED','CANCELED','DONE']);
            $table->text('description')->nullable();
            $table->datetime('requested_at')->nullable();
            $table->datetime('finished_at')->nullable();
            $table->timestamps();
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
