<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'notes',
        'status',
        'image',
        'slug'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'image'
    ];

    protected $appends = [
        'image_url'
    ];

    public static function rules($id = 0)
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255', "unique:categories,name,$id"],
            'notes' => ['nullable', 'string'],
            'image' => ['nullable'],
            'status' => ['nullable', 'in:active,inactive'],
        ];
    }
    public function post(){
        return $this->hasMany(post::class,'category_id','id');
    }
    //image settings
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://www.firstcolonyfoundation.org/wp-content/uploads/2022/01/no-photo-available.jpeg';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }
}
