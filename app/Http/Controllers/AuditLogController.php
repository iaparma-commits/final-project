<?php
namespace App\Http\Controllers;
use App\Models\AuditLog;

class AuditLogController extends Controller
{
    public function index(){ return view('audit.index',['logs'=>AuditLog::all()]); }
    public function destroy(AuditLog $log){ $log->delete(); return back(); }
}