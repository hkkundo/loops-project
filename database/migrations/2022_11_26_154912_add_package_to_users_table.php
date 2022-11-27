<?php

use App\Models\Package;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('package', Package::pluck('prefix')->toArray())
                ->after('id')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *$table->dropForeign('posts_user_id_foreign');
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['package']);
        });
    }
};
