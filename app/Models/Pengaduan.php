<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table ='pengaduan';
    protected $primaryKey = 'pengaduan_id';
    public $incrementing = true;
    protected $fillable = ['nama', 'no_ktp', 'no_hp', 'email','detail','foto_nama','foto_nama_store','nomor_pengaduan', 'status'];

    public function tindakan(): HasMany
    {
        return $this->hasMany(Tindakan::class,'pengaduan_id');
    }
}
