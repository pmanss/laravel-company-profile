<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Post extends Model
{
	protected $table	= "post";
	protected $fillable	= ["category_id","post_name","post_slug","post_description","post_image"];
	public $timestamps	= true;
    const IMAGE_PATH 	= "img/post_image/";

    public function category()
    {
        return $this->belongsTo('App\PostCategory', 'category_id', 'id');
    }

    public static function upload($request)
    {
        $file       = $request->file("file");
        $path       = self::IMAGE_PATH;
        $file_name  =  str_random(20).".".$file->getClientOriginalExtension();
        $file->move($path, $file_name);

        return $file_name;
    }
}