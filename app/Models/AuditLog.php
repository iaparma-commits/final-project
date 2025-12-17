<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id','budget_id','action','action_date'];
}