<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1517327069ComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('computers')) {
            Schema::create('computers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('mac')->nullable();
                $table->string('os')->nullable();
                $table->string('owner')->nullable();
                $table->string('details')->nullable();
                $table->text('description')->nullable();
//                $table->string('factura')->nullable();
                $table->enum('status', ['Active', 'Broken', 'Service', 'Free'])->nullable();
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
        Schema::dropIfExists('computers');
    }
}
