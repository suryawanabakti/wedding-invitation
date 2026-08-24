<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Storage;

trait HasImageUrl
{
    /**
     * Resolve an image column to a usable URL. Falls back to a stable
     * placeholder so layouts never break before an image is uploaded.
     */
    public function imageUrl(string $column, ?string $fallbackSeed = null): string
    {
        $value = $this->getAttribute($column);

        if (blank($value)) {
            return 'https://picsum.photos/seed/'.($fallbackSeed ?? class_basename($this).'-'.$column).'/800/800';
        }

        if (str_starts_with($value, 'http') || str_starts_with($value, '//')) {
            return $value;
        }

        return Storage::url($value);
    }
}
