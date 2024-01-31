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
        Schema::table('users', function (Blueprint $table) {
            $table->string('admission_number')->nullable()->default(null);
            $table->date('admission_date')->nullable()->default(null);
            $table->string('roll_number')->nullable()->default(null);
            $table->foreignId('class_id')->nullable()->default(null)->constrained('class_rooms')->cascadeOnDelete();
            $table->string('gender')->nullable()->default(null);
            $table->date('date_of_birth')->nullable()->default(null);
            $table->string('cast')->nullable()->default(null);
            $table->string('religion')->nullable()->default(null);
            $table->string('mobile_number')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->integer('height')->nullable()->default(null);
            $table->integer('weight')->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('admission_number');
            $table->dropColumn('admission_date');
            $table->dropColumn('roll_number');
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('cast');
            $table->dropColumn('religion');
            $table->dropColumn('mobile_number');
            $table->dropColumn('image');
            $table->dropColumn('height');
            $table->dropColumn('weight');




        });
    }
};
