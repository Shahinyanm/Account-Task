<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = ['file_path'];

    protected $appends = [
        'full_path'
    ];

    public function getFullPathAttribute()
    {
        return Storage::disk('public')->url($this->file_path);
    }

    /**
     * Get the owning mediaable model.
     */
    public function mediaable()
    {
        return $this->morphTo();
    }
}
