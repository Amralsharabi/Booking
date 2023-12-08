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
        Schema::create('death_statements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('common_data_id')->constrained('common_data');
            $table->foreignId('province_id')->constrained('provinces');
            $table->foreignId('directorate_id')->constrained('directorates');
            $table->foreignId('center_id')->constrained('card_version_centers');
            $table->dateTime('date_death');
            $table->foreignId('ty_document_id')->constrained('ty_documents');
            $table->string('card_No_decea');
            $table->date('date_card_issuance_dec');
            $table->foreignId('card_version_center_id')->constrained('card_version_centers');
            $table->foreignId('request_statu_id')->constrained('request_status');
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
        Schema::dropIfExists('death_statements');
    }
};
