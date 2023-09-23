<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSandboxBalanceHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sandbox_balance_history', function (Blueprint $table) {
            $table->id();
            $table->morphs('balanceable');
            $table->integer('amount')->default(0);
            //morphs referenceable nullable
            $table->string('ref_type')->nullable();
            $table->unsignedBigInteger('ref_id')->nullable();

            $table->text('description')->nullable();
            $table->timestamps();

            //compound index
            $table->index(['ref_type', 'ref_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sandbox_balance_history');
    }
}
