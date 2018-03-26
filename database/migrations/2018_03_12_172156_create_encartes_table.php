<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encartes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable();
            $table->enum('type', ['Varejo', 'Atacado', 'Multi-Atacado', 'Master']);
            $table->string('info');
            $table->integer('unit');
            $table->float('price', 6, 2);
            $table->integer('rescue_point')->default(10000);
            $table->tinyInteger('status')->default(1);
            $table->dateTime('start_at')->default(Carbon::now()->addDay(2));
            $table->dateTime('expire_at')->default(Carbon::now()->addDay(2));
            $table->integer('installment')
                ->default(1)
                ->comment('Parcelamento');
            $table->softDeletes();
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
        Schema::dropIfExists('encartes');
    }
}
