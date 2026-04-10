<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientLogo extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
