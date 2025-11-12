<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('username')->unique()->nullable()->after('name');


            $table->date('verjaardag')->nullable()->after('username');


            $table->string('profielfoto')->nullable()->after('verjaardag');


            $table->text('over_mij')->nullable()->after('profielfoto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'verjaardag', 'profielfoto', 'over_mij']);
        });
    }
};