<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebDesign extends Model
{
    use HasFactory;

    protected $fillable = [
        'component_name',
        'component_key',
        'title',
        'subtitle',
        'content',
        'image_url',
        'video_url',
        'button_text',
        'button_url',
        'position',
        'is_active',
        'settings'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'settings' => 'json',
        'content' => 'json'
    ];

    /**
     * Get component by key
     */
    public static function getByKey($key)
    {
        return static::where('component_key', $key)->where('is_active', true)->first();
    }

    /**
     * Get all active components ordered by position
     */
    public static function getActiveComponents()
    {
        return static::where('is_active', true)->orderBy('position')->get();
    }

    /**
     * Scope for active components
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered by position
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('position');
    }
}
