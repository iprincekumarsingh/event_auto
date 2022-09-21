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
        Schema::create('eventregs', function (Blueprint $table) {
            $table->id('pid');
            $table->string('amount');
            $table->string('uid');
            $table->string('name');
            $table->string('email');
            $table->string('event_id');
            $table->string('contact');
            $table->string('phone');
            $table->string('address');
            $table->string('payment_id')->nullable();
            $table->string('razorpay_id')->nullable();
            $table->string('payment_done')->default(false);
            $table->string('entryDone')->default(false);
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
        Schema::dropIfExists('eventregs');
    }
};
