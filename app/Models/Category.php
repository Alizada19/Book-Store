<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Book;

class Category extends Model
{
    use HasSlug;
    protected $fillable = ['name', 'description', 'userId'];

    public function books()  // note: lowercase plural 'books'
    {
        return $this->hasMany(Book::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    
}
