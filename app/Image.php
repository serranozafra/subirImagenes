<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Image extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'path'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getRealPathAttribute()
    {
        Storage::get($this->path);
    }

    public function getResizedImageAttribute()
    {
        if(file_exists($this->path))
        {
            $image = imagecreatefromjpeg($this->path);

            imagefilter($image, IMG_FILTER_COLORIZE, 255, 0, 0); // make it blue!

            imagejpeg($image, $this->path."-thumb.jpg");

            return url($this->path."-thumb.jpg");
        }
    }

    public function getResizedImageAttributeImgIntervention()
    {
        //return (url($this->path));
        if(File::exists($this->path))
        {
            $img = \Intervention\Image\Facades\Image::make($this->path);
            $img->colorize(100, 100, 0);
            $img->resize(300,null,function($bla){
               $bla->aspectRatio();
            });
            $img->save($this->path."-thumb.jpg");

            return url($this->path."-thumb.jpg");
        }
        else
            return "No existe";
    }
}
