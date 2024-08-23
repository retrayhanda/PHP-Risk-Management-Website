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
        Schema::create('risk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_risiko');
            $table->enum('status_risiko', ['active', 'retired'])->default('active');
            $table->enum('ancaman', ['threat', 'opportunity'])->default('opportunity');
            $table->enum('kategori_risiko', ['operational', 'hazard','finance', 'strategy&planning'])->nullable;
            $table->integer('kode_unit');
            $table->string('sasaran');
            $table->string('periode');
            $table->string('deskripsi_risiko');
            $table->string('akar_penyebab');
            $table->string('indikator_risiko');
            $table->string('faktor_positif');
            $table->string('dampak_kualitatif');
            $table->integer('probabilitas');
            $table->integer('dampak');
            $table->integer('skor_risiko');
            $table->string('tingkat_risiko');
            $table->integer('probabilitas_risiko');
            $table->bigInteger('dampak_financial');
            $table->bigInteger('nilai_bersih_risiko');
            $table->string('pemilik_risiko');
            $table->string('jabatan');
            $table->string('nomor_hp');
            $table->string('email');
            $table->enum('strategi', ['mitigate', 'avoid', 'accept', 'transfer', 'share', 'enchance'])->nullable();
            $table->string('penanganan')->nullable();
            $table->integer('biaya_risiko')->nullable();
            $table->string('penanganan_risiko')->nullable();
            $table->integer('probabilitas_residual')->nullable();
            $table->integer('dampak_residual')->nullable();
            $table->integer('skor_risiko_residual')->nullable();
            $table->string('tingkat_risiko_residual')->nullable();
            $table->integer('probabilitas_risiko_residual')->nullable();
            $table->bigInteger('dampak_financial_residual')->nullable();
            $table->bigInteger('nilai_bersih_risiko_residual')->nullable();
            $table->string('departemen')->nullable();
            $table->enum('status', ['pengajuan', 'diterima','pemantauan', 'ditolak'])->default('pengajuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk');
    }
};