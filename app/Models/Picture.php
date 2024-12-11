<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    protected $fillable = ['filename'];

    public function getImageUrl(): string
    {
        return Storage::url($this->filename);
    }
}
