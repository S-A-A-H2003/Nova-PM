<?php

namespace App\Actions\Project;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class SearchProject {

    public function search($request)
    {
        $result_category = $request->input('category');
        $result_search = $request->input('search');

        if(isset($result_category)) {
            $browse_projects = Project::where('category' , $result_category)->where('user_id' , '!=' , Auth::id())->paginate('6');
        }elseif(isset($result_search)) {
            $browse_projects = Project::search("name" , $result_search)->where('user_id' , '!=' , Auth::id())->paginate('6');
        }else{
            $browse_projects = Project::where('user_id' , '!=' , Auth::id())->paginate('6');
        }

        return $browse_projects;
    }
}
