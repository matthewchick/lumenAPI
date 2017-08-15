<?php namespace App;
/**
 * Created by PhpStorm.
 * User: MatthewChick
 * Date: 15/8/2017
 * Time: 5:22 PM
 * The "meat" of your application lives in the app directory. By default, this directory is namespaced under App
 * The app directory ships with a variety of additional directories such as Console, Http, and Providers
 */

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['id', 'title', 'description','value'];
    protected $hidden = ['created_at', 'updated_at'];

    // Inverse of the relation - belongsTo or belongsToMany
    // A course belongs to many students  M:N
    public function students()
    {
        return $this->belongsToMany('App\Student');
    }

    // A course belongs to teacher  1:N
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
}