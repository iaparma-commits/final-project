<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;

class BudgetApproval extends Model
{
    public $timestamps = false;
    protected $fillable = ['budget_id','approved_by','decision','remarks','approved_at'];

    public static function list()
    {
        return DB::table('budget_approvals')
            ->join('budget_allocations','budget_allocations.id','=','budget_approvals.budget_id')
            ->select('budget_approvals.*','budget_allocations.amount_allocated')
            ->get();
    }
}