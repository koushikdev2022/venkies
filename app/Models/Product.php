<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    protected $guarded=['id'];
    use HasFactory,InteractsWithMedia;
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(184)
            ->height(116)
            ->sharpen(5);
    }

    public function product(){
        return $this->hasMany(Cart::class,'product');
    }

}
