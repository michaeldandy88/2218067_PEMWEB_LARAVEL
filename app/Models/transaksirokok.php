<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksirokok extends Model
{
    use HasFactory;
    protected $table = 'transaksirokoks';
    protected $fillable = ['jumlah','jenisrokok_id', 'status'];
   
    public function jenisrokok()
    {
        return $this->belongsTo(jenirokok::class, 'jenisrokok_id');
    }
    
}
