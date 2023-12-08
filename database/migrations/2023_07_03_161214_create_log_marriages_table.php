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
        Schema::create('log_marriages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('province_id')->constrained('provinces');
            $table->foreignId('directorate_id')->constrained('directorates');
            $table->foreignId('center_id')->constrained('card_version_centers');
            $table->date('date_contract_ad');
            $table->date('date_contract_he');
            $table->foreignId('province_contract_id')->constrained('provinces');
            $table->foreignId('directorate_contract_id')->constrained('directorates');
            $table->integer('marri_type');
            $table->string('Court_na');
            $table->string('document_no');
            $table->date('date_document');
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
        Schema::dropIfExists('log_marriages');
    }
};
