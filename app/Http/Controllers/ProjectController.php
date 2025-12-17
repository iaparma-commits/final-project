<?php
namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
public function index(){ return view('projects.index',['projects'=>Project::allProjects()]); }
public function create(){ return view('projects.create'); }
public function store(Request $r){ Project::create($r->all()); return redirect()->route('projects.index'); }
public function edit(Project $project){ return view('projects.edit',compact('project')); }
public function update(Request $r, Project $project){ $project->update($r->all()); return redirect()->route('projects.index'); }
public function destroy(Project $project){ $project->delete(); return back(); }
}