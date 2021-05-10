<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = ['title', 'user_id', 'content', 'date', 'image', 'published', 'premium'];
    protected $dates = ['date'];
    protected $casts = [
        'premium' => 'boolean',
        'published' => 'boolean',
    ];

    use HasFactory;

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function scopePublished($query)
    {
        $user = auth()->user();
        if ($user && $user->isAdmin()) {
            return $query;
        }
        if (!$user) {
            return $query->where('premium', 0)->where('published', 1);
        }
        return $query->where('published', 1);

    }
    public function getExcerptContentAttribute()
    {
        return Str::limit(strip_tags($this->content), 300);
    }
    public function getExcerptTitleAttribute()
    {
        return Str::limit(strip_tags($this->title), 50);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getPhotoAttribute()
    {
        return Str::startsWith($this->image, 'http') ? $this->image : Storage::url($this->image);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
