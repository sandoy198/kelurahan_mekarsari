<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = null;
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $division = [
        [
            'id' => '1',
            'nama' => 'Admin'
        ],
        [
            'id' => '2',
            'nama' => 'Kepala Desa'
        ],
        [
            'id' => '3',
            'nama' => 'Wakil Kepala Desa'
        ]
    ];
    public function getDivisionAttribute($value = null)
    {
        if ($value === null) {
            return $this->division;
        }
        foreach ($this->division as $d) {
            if ($d['id'] == $value) {
                return $d['nama'];
            }
        }
        return null;
    }
}
