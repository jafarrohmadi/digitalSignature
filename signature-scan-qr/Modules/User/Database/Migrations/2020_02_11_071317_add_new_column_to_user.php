<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('uid')->after('id');
            $table->string('nik', 30)->after('uid')->nullable();
            $table->string('nickname')->after('name')->nullable();
            $table->string('phones', 30)->after('nickname')->nullable();
            $table->integer('division')->after('email')->nullable();
            $table->integer('department')->after('division')->nullable();
            $table->string('designation', 300)->after('department')->nullable();
            $table->string('actual')->after('designation')->nullable();
            $table->integer('ayoohris')->after('actual');
            $table->text('client_cid')->after('ayoohris')->nullable();
            $table->text('company_code')->after('client_cid')->nullable();
            $table->text('photo')->after('company_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                                'nickname',
                                'actual',
                                'ayoohris',
                                'client_cid',
                                'company_code',
                                'photo'
            ]);
        });
    }
}
