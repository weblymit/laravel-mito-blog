<?php

namespace App\Models;

use App\Models\Images;
use App\Models\Comment;
use App\Models\Category;
use App\Models\FeaturedImage;
use App\Models\ListOfCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function images()
  {
    return $this->hasMany(Images::class);
  }

  public function featuredImage()
  {
    return $this->hasOne(FeaturedImage::class);
  }

  /**
   * Get the category associated with the post.
   */
  public function category()
  {
    return $this->hasOne(Category::class);
  }
}
