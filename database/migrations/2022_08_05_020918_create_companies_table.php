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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('segment_id')->nullable()->constrained()->onDelete('set null');
            $table->string('fantasy_name');
            $table->string('corporate_name');
            $table->string('cnpj', 14);
            $table->string('region', 3);
            $table->boolean('active')->default(true);
            $table->integer('default_cost')->nullable();
            $table->integer('daily_limit')->nullable();
            $table->integer('day_balance')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
