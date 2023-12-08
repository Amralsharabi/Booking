<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_damage_renewals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('common_data_id')->constrained('common_data')->cascadeOnDelete();
            $table->string('req_type');
            $table->foreignId('province_id')->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('directorate_id')->constrained('directorates')->cascadeOnDelete();
            $table->foreignId('center_id')->constrained('card_version_centers')->cascadeOnDelete();
            $table->foreignId('province_version_card_id')->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('directorate_version_card_id')->constrained('directorates')->cascadeOnDelete();
            $table->foreignId('card_version_center_id')->constrained('card_version_centers')->cascadeOnDelete();
            $table->date('date_version');
            $table->foreignId('request_statu_id')->constrained('request_status')->cascadeOnDelete();
            $table->date('time_attendees')->nullable();
            $table->string('time_attendees_hijri')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_damage_renewals');
    }
};
