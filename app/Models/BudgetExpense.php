<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BudgetExpense extends Model
{
    protected $fillable = ['budget_id','amount_spent','expense_date'];
}