<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRememberTokenToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('user', function($table) {
            $table->string('email', 255)->nullable()->change();
        });

        DB::table('user')
            ->where('email', '')
            ->update(['email' => null]);

        Schema::table('user', function($table) {
            $table->unique('email');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable();
            $table->renameColumn('password', 'old_password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('user', function (Blueprint $table) {
            $table->string('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('password');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->renameColumn('old_password', 'password');
        });

        Schema::table('user', function($table) {
            $table->dropUnique('user_email_unique');
        });

        DB::table('user')
            ->where('email', null)
            ->update(['email' => '']);

//        Schema::table('user', function($table) {
//            $table->string('email')->nullable(false)->change();
//        });
    }
}
