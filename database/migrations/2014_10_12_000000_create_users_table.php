<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>Employee, 1=>Admin , 2=Manager */

            $table->tinyInteger('manager')->default(0);
            $table->tinyInteger('c_manager')->default(0);
            $table->tinyInteger('d_manager')->default(0);
            $table->tinyInteger('e_manager')->default(0);
            $table->tinyInteger('employee')->default(0);
            $table->tinyInteger('c_employee')->default(0);
            $table->tinyInteger('d_employee')->default(0);
            $table->tinyInteger('e_employee')->default(0);
            /* parmission: 0=>No, 1=>Yes,*/
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
