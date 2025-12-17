<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;


class BudgetAllocation extends Model
{
protected $fillable = ['project_id','created_by','amount_allocated','period_start','period_end','status'];


public static function list()
{
return DB::table('budget_allocations')
->join('projects','projects.id','=','budget_allocations.project_id')
->select('budget_allocations.*','projects.project_name')
->get();
}


public static function storeData($data)
{
return self::create($data);
}
}