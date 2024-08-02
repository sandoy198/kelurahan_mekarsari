<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tindakan extends Model
{
    use HasFactory;

    protected $table = 'tindakan';
    protected $primaryKey = 'tindakan_id';
    public $incrementing = true;
    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'detail'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
