<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'component_target',
        'parent_id',
        'position',
        'is_active',
        'is_external',
        'icon',
        'description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_external' => 'boolean'
    ];

    protected $appends = ['link_type'];

    /**
     * Get parent menu item
     */
    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    /**
     * Get child menu items
     */
    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('position');
    }

    /**
     * Get active menu items
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get main menu items (no parent)
     */
    public function scopeMainMenu($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Get ordered menu items
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('position');
    }

    /**
     * Get menu tree structure
     */
    public static function getMenuTree()
    {
        return static::active()
            ->mainMenu()
            ->ordered()
            ->with(['children' => function($query) {
                $query->active()->ordered();
            }])
            ->get();
    }

    /**
     * Get final URL (component target or custom URL)
     */
    public function getFinalUrlAttribute()
    {
        if ($this->component_target) {
            return '#' . $this->component_target;
        }
        return $this->url;
    }

    /**
     * Get link type for form
     */
    public function getLinkTypeAttribute()
    {
        if ($this->component_target) {
            return 'component';
        }
        if ($this->is_external) {
            return 'external';
        }
        if ($this->url) {
            return 'custom';
        }
        return 'component';
    }
}
