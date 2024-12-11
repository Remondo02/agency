<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picture;

class PictureController extends Controller
{
    public function destroy(Picture $picture)
    {
        $picture->delete();
        return '';
    }
}
