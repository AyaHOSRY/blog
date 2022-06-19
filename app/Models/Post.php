<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title',
        'body',
        'category_id',
        'tag_id',
        'slug'
    
    ];
    /**
     * Set the tags
     *
     */
    public function setTagAttribute($value)
    {
        $this->attributes['tag'] = json_encode($value);
    }

    /**
     * Get the tags
     *
     */
    public function getTafAttribute($value)
    {
        return json_decode($value);
    }

    

    public function category()
      {
        return $this->belongsTo(Category::class);
      }

      public function tags()
      {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id' , 'tag_id');
      }

      public function comments()
      {
        return $this->hasMany(Comment::class);
      }
}
