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
        Schema::table('class_timetable', function (Blueprint $table) {
           $table->dropConstrainedForeignId('class_id');
           $table->dropConstrainedForeignId('subject_id');
           $table->foreignId('class_subject_id')->constrained('class_subject')->cascadeOnDelete();
           $table->dropColumn('time');
           $table->time('start_time')->nullable();
           $table->time('end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class_timetable', function (Blueprint $table) {
            //
        });
    }
};
