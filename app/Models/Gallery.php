<?php

namespace App\Models;

use App\Models\Concerns\HasImageUrl;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['image', 'caption', 'sort_order'])]
class Gallery extends Model
{
    /** @use HasFactory<Database\Factories\GalleryFactory> */
    use HasFactory, HasImageUrl;

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }
}
