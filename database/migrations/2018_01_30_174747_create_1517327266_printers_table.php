<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1517327266PrintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('printers')) {
            Schema::create('printers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('model')->nullable();
                $table->string('mac')->nullable();
                $table->string('ip')->nullable();
                $table->integer('location_id')->nullable()->unsigned()->index();
//                $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('printers');
    }
}
