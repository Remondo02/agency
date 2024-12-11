<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal_code',
        'sold',
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(): string
    {
        return Str::slug($this->title);
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }

    /**
     * @param UploadedFile[] $files
     */
    public function attachFiles(array $files)
    {
        $pictures = [];
        foreach ($files as $file) {
            if ($file->getError()) {
                continue;
            }
            $filename = $file->store('properties/' . $this->id, 'public');
            $pictures[] = [
                'filename' => $filename,
            ];
        }
        if (count($pictures) > 0) {
            $this->pictures()->createMany($pictures);
        }
    }

    public function getPicture(): ?Picture
    {
        return $this->pictures[0] ?? null;
    }
}
