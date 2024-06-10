<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenirokok extends Model
{
    use HasFactory;
    protected $table = 'jenirokoks';
    protected $primaryKey = 'id_jenis';
    public $incrementing = true;
    protected $fillable = ['nama', 'isi', 'jenis','gambar'];
    public $timestamps = false;
}
