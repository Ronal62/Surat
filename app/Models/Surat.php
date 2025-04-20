<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat'; // nama tabel di database

    protected $primaryKey = 'surat_id'; // primary key kustom

    protected $fillable = [
        'surat_judul',
        'surat_tgl_upload',
        'surat_kode',
        'surat_qr_code',
        'surat_link',
        'surat_pdf',
    ];
}