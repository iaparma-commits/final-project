<?php
namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;


class UserController extends Controller
{
public function index(){ return view('users.index',['users'=>Users::allUsers()]); }
public function create(){ return view('users.create'); }
public function store(Request $r){ Users::create($r->all()); return redirect()->route('users.index'); }
public function edit(Users $user){ return view('users.edit',compact('user')); }
public function update(Request $r, Users $user){ $user->update($r->all()); return redirect()->route('users.index'); }
public function destroy(Users $user){ $user->delete(); return back(); }
}