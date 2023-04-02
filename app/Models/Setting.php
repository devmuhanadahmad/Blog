<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'logo',
        'favicon',
        'facebbok',
        'twiter',
        'instagram',
        'email',
        'phone',
        'address',
    ];
    public static function rules($id = 0)
    {
        return [
            'title'=>['required', 'string', 'min:3', 'max:255', "unique:categories,name,$id"],
            'content'=>['nullable', 'string'],
            'logo'=> ['image', 'mimes:jpeg,png,jpg,gif,svg', 'dimensions:max_height=2048,min_width=100'],
            'favicon'=> ['nullable','image', 'mimes:jpeg,png,jpg,gif,svg', 'dimensions:max_height=2048,min_width=100'],
            'facebbok'=>['nullable', 'string'],
            'twiter'=>['nullable', 'string'],
            'instagram'=>['nullable', 'string'],
            'email'=>['nullable', 'string'],
            'phone'=>['nullable', 'string'],
            'address'=>['nullable', 'string'],
        ];
    }
    public static function checkSetting(){
        $setting=self::all();
        if(count($setting) < 1){
          $data=[
            'id'=>4,
            'title'=>'Blog',
            'logo'=>'sdv',
          ];
          self::create($data);
        }
        return self::first();
    }
}

