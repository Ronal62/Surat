<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
Schema::create('surat', function (Blueprint $table) {
$table->id('surat_id');
$table->string('surat_judul');
$table->date('surat_tgl_upload');
$table->string('surat_kode')->unique();
$table->string('surat_qr_code')->nullable();
$table->string('surat_link')->nullable();
$table->string('surat_pdf')->nullable();
$table->timestamps(); // otomatis buat created_at dan updated_at
});
}

public function down(): void
{
Schema::dropIfExists('surat');
}
};
