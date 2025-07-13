<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CV extends Model
{
    protected $table = 'cvs';

    protected $fillable = [
        'name',
        'file_path',
        'is_active',
        'uploaded_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'uploaded_at' => 'datetime'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Accessor để lấy URL của CV
    public function getCvUrlAttribute()
    {
        return $this->file_path ? Storage::disk('public')->url($this->file_path) : null;
    }

    // Accessor để lấy download URL
    public function getDownloadUrlAttribute()
    {
        return route('cv.download');
    }

    // Accessor để lấy view URL
    public function getViewUrlAttribute()
    {
        return route('cv.view');
    }

    // Method để lấy CV active hiện tại
    public static function getActiveCv()
    {
        return static::active()->latest()->first();
    }
}
