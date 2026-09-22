<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Motor extends Model
{
    protected $table = 'motor';

protected $fillable = [
    'nama_motor',
    'plat_nomor',
    'kategori_id',
    'foto',
    'cc',
    'status',
];

    public function booking(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
