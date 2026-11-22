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
        Schema::table('states', function (Blueprint $table) {
            if (Schema::hasColumn('states', 'delivery_fee')) {
                $table->dropColumn('delivery_fee');
            }
            if (Schema::hasColumn('states', 'install_fee')) {
                $table->dropColumn('install_fee');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('states', function (Blueprint $table) {
            $table->unsignedBigInteger('delivery_fee')->default(0)->after('code');
            $table->unsignedBigInteger('install_fee')->default(0)->after('delivery_fee');
        });
    }
};

