<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
class Watch extends Model
{
    use HasFactory;
    protected $fillable=['category_id','name','price','image','description'];
    public function category(){
        return $this->belongTo(Category::class);
    }
}