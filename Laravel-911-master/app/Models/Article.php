<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['name', 'content', 'category_id', 'image', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute($value)
    {
        return $value === null ? '/image/noImage.png' : $value;
    }

    public function setImageAttribute($value)
    {
        $value === null ? '/image/noImage.png' :  $this->attributes['image'] = explode("storage", $value)[1];
    }

    public function getShortContentAttribute()
    {
        return Str::words(strip_tags($this->content), 3);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}