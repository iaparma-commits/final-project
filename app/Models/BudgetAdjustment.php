<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BudgetAdjustment extends Model
{
    public $timestamps = false;
    protected $fillable = ['budget_id','adjusted_by','old_amount','new_amount','reason','adjusted_at'];
}