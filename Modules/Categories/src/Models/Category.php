<?php

namespace Modules\Categories\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Categories as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function children(){
         return $this->hasMany(Category::class , 'parent_id');
    }
    public function subCategories(){
        return $this->children()->with('subCategories');
    }
        
}
