<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1517325685UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email');
                $table->string('password');
                $table->integer('location_id')->nullable()->unsigned()->index();
//                $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
                $table->integer('role_id')->nullable()->unsigned()->index();
//                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
                $table->integer('department_id')->nullable()->unsigned()->index();
//                $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
                $table->integer('status_id')->nullable()->unsigned()->index();
//                $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
                $table->string('remember_token')->nullable();

                $table->softDeletes();
                $table->timestamps();

                $table->index(['deleted_at']);
                
            });
            Schema::table('users', function(Blueprint $table) {
                $table->foreign('location_id')->references('id')->on('locations')
                    ->onDelete('cascade');
            });
            Schema::table('roles', function(Blueprint $table) {
                $table->foreign('role_id')->references('id')->on('roles')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
