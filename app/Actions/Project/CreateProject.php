<?php

namespace App\Actions\Project;

use App\Models\Project;
use App\Services\Utilities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateProject {

    public function create($request)
    {
        $utilities = new Utilities();

        $validated = $request->validated();
        $validated['description'] = $utilities->descriptionClean($request->input('description'));
        $validated['user_id'] = Auth::id();
        if ($request->input('budget') == 0) {
                $validated['type'] = 'free';
        }else{
                $validated['type'] = 'paid';
        }
        try {
            DB::beginTransaction();
            $result = Project::create($validated);
            if ($request->hasFile('files')) {
                $data = [];
                foreach ($request->file('files') as $file) {
                    $data[] = [
                        "id" => uuid_create(),
                        "project_id" => $result->id,
                        "attachment" => $file->store('attachment/project'),
                        "created_at" => now(),
                        "updated_at" => now()
                    ];
                }
                DB::table('attachments')->insert($data);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        return $result;
    }
}
