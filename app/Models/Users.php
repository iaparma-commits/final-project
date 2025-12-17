<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Users extends Model
{
protected $fillable = ['full_name','email','role','status'];


public static function allUsers()
{
return self::orderBy('full_name')->get();
}
}