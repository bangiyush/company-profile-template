<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $fillable = [
        'company_name',
        'tagline',
        'description',
        'meta_keywords',
        'logo',
        'favicon',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'whatsapp',
        'google_analytics_id',
        'header_scripts',
        'footer_scripts',
        'primary_color',
        'secondary_color',
        'accent_color',
        'bg_color',
        'text_color',
        'card_color',
    ];

    /**
     * Get the singleton company settings
     */
    public static function getSettings()
    {
        return self::first() ?? new self([
            'company_name' => 'Company Name',
            'tagline' => 'Your tagline here',
        ]);
    }

    /**
     * Get logo URL
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    /**
     * Get favicon URL
     */
    public function getFaviconUrlAttribute()
    {
        return $this->favicon ? asset('storage/' . $this->favicon) : null;
    }
}
