<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCheckedInParentCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paren_categories', function (Blueprint $table) {
            $table->tinyInteger('checked')->after('code')->nullable()->default(0);
            $table->tinyInteger('completed')->after('checked')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paren_categories', function (Blueprint $table) {
            $table->dropColumn('checked');
            $table->dropColumn('checked');
        });
    }
}
