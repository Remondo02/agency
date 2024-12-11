<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    protected $fillable = ['filename'];

    protected static function booted(): void
    {
        static::deleting(function (Picture $picture) {
            Storage::disk('public')->delete($picture->filename);
        });
    }

    public function getImageUrl(): string
    {
        return Storage::url($this->filename);
    }
}
