<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'user_id', 'content', 'date', 'image', 'published', 'premium'];
    protected $dates = ['date'];

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
        if ($user) {
            return $query->where('published', 1);
        }
        if (!$user) {
            return $query->where('premium', 0)->where('published', 1);
        }
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
}
