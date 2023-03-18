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
        Schema::create('faults', function (Blueprint $table) {
            $table->id();

            $table->text('name');
            $table->tinyText('fault_inv')->nullable();
            $table->text('description');
            $table->text('service_info')->nullable();

            $table->foreignId('item_id')->nullable()->constrained('items');
            $table->foreignId('owner_id')->constrained('owners');

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
        Schema::dropIfExists('faults');
    }
};
