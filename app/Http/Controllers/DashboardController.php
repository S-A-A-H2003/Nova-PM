<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        // Projects
        $project_number = $user->projects->count();
        $project_category_programming_number = $user->projects->where('category' , 'programming')->count();
        $project_category_designing_number = $user->projects->where('category' , 'designing')->count();
        $project_category_other_number = $user->projects->where('category' , 'other')->count();
        $project_type_free_number = $user->projects->where('type' , 'free')->count();
        $project_type_paid_number = $user->projects->where('type' , 'paid')->count();
        $project_status_active_number = $user->projects->where('status' , 'active')->count();
        $project_status_stopped_number = $user->projects->where('status' , 'stopped')->count();

        // Tasks
        $in_progress = $user->tasks->count();

        //Search
        $user_to_view_cv = null;
        $result_search = $request->input('search');
        if ($result_search) {
            $user_to_view_cv = User::search('name' , $request->input('search'))->get();
        }
        return view('dashboard' , compact('project_number' , 'project_category_programming_number' , 'project_category_designing_number' , 'project_category_other_number' , 'project_type_free_number' , 'project_type_paid_number' , 'project_status_active_number' , 'project_status_stopped_number' , 'in_progress' , 'user_to_view_cv' , 'result_search'));
    }
}
