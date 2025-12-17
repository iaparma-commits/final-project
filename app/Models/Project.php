<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
protected $fillable = ['project_name','department_name'];


public static function allProjects()
{
return self::orderBy('project_name')->get();
}
}