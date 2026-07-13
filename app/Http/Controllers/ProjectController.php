<?php

namespace App\Http\Controllers;

use App\Actions\Project\CreateProject;
use App\Actions\Project\SearchProject;
use App\Actions\Project\UpdateProject;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(Request $request , SearchProject $search_project)
    {
        $success = Session::get('success');
        $error = Session::get('error');
        $my_projects = Auth::user()->projects()->paginate('6');
        $browse_projects = $search_project->search($request);
        $result_search = $request->input('search');
        return view('project.index' , compact('success' ,'error' , 'my_projects' , 'browse_projects' , 'result_search'));
    }

    public function show(Project $project)
    {
        $success = Session::get('success');
        $error = Session::get('error');
        $comments = $project->comments()->with('user')->latest()->get();
        return view('project.show' , compact('project' , 'success' ,'error', 'comments'));
    }

    public function store(ProjectStoreRequest $request , CreateProject $create_project)
    {
        $create_project->create($request);
        return redirect()->route('project.index')->with('success' , 'The project was successfully created.');
    }



    public function update(ProjectUpdateRequest $request, UpdateProject $update_project , Project $project)
    {
       Gate::authorize('update' , [Project::class , $project]);
       if ($project->deliveries()->count() == 0 && $project->tasks->count() == 0) {
            $result = $update_project->update($request , $project);
            if ($result == true) {
                return redirect()->route('project.show' , $project->id)->with('success' , 'The project was successfully updated.');
            }else{
                return back()->withInput()->withErrors($result);
            }
        }else{
            return redirect()->route('project.index')->with('error' , 'You can not edited the project for preordful delivery or preordful task.');
        }
    }

    public function destroy(Project $project)
    {
        Gate::authorize('delete' , [Project::class , $project]);
        if ($project->deliveries()->count() == 0 ) {
            $project->delete();
            foreach ($project->attachments as $attachment) {
                Storage::delete($attachment->attachment);
            }
            $project->attachments()->delete();
            return redirect()->route('project.index')->with('success' , 'The project was successfully deleted.');
        }else{
            return redirect()->route('project.index')->with('error' , 'You can not deleted the project for preordful delivery.');
        }
    }
}
