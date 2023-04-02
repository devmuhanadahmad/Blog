<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =
    [
        'category_id',
        'user_id',
        'title',
        'image',
        'content',
        'smallDes',
        'status'
    ];
    protected $hidden =[
        'created_at','updated_at','deleted_at','image'
    ];
    protected $appends =[
         'image_url'
    ];
    public static function rules($id = 0)
    {
        return
            [
                //'cateory_id'=>['nullable','int','exists:categories,id'],
                //'user_id'=>['nullable','int','exists:users,id'],
                'title' => ['required', 'string', 'min:3', 'max:255', "unique:categories,name,$id"],
                'smallDes' => ['required', 'string', 'min:2', 'max:255'],
                'content' => ['nullable', 'string'],
                'image' => ['nullable'],
                'status' => ['nullable', 'in:active,inactive']
            ];
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault([
            'category_id' => 'Primary Category'
        ]);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    //image settings
    public function getImageUrlAttribute(){
    if (! $this->image) {
        return 'https://www.firstcolonyfoundation.org/wp-content/uploads/2022/01/no-photo-available.jpeg';
    }
    if(Str::startsWith($this->image,['http://','https://'])){
        return $this->image;
    }
    return asset('storage/'.$this->image);
    }


    //globle scope
    public static function booted()
    {
        static::addGlobalScope('project', function (Builder $builder) {
            $user = Auth::user();
            if ($user && $user->id) {
                $builder->where('user_id', '=', $user->id);
            }

        });

    }


}
