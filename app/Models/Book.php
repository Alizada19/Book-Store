<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
    use InteractsWithMedia, HasSlug;
    protected $fillable = ['title', 'slug','description','price','category_id','seller_id'];

    // Relationship with the User model (seller)
    public function seller()
    {
        // Book belongs to a user (seller)
        return $this->belongsTo(User::class, 'seller_id');
    }

    // Relationship with the Category model
    public function category()
    {
        // Book belongs to a category
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    // THIS MAKES SLUG WORK EVERYWHERE (frontend + backend)
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }
}
