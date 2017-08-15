<?php namespace App;
/**
 * Created by PhpStorm.
 * User: MatthewChick
 * Date: 15/8/2017
 * Time: 5:22 PM
 * The "meat" of your application lives in the app directory. By default, this directory is namespaced under App
 * The app directory ships with a variety of additional directories such as Console, Http, and Providers
 * https://laravel.com/docs/5.1/eloquent-relationships
 */

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['id', 'name', 'address','phone', 'profession'];
    protected $hidden = ['created_at', 'updated_at'];

    // A teacher teaches many courses
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}