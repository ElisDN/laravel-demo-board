<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserPhone extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->boolean('phone_verified')->default(false)->after('phone');
            $table->string('phone_verify_token')->nullable()->after('verify_token');
            $table->timestamp('phone_verify_token_expire')->nullable()->after('phone_verify_token');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_verify_token_expire');
            $table->dropColumn('phone_verify_token');
            $table->dropColumn('phone_verified');
            $table->dropColumn('phone');
        });
    }
}
