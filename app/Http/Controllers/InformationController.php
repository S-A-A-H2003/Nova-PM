<?php

namespace App\Http\Controllers;

use App\Http\Requests\OverviewRequest;
use App\Models\Information;
use DragonCode\Support\Facades\Helpers\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function overview(OverviewRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();
            $date_user = [
                'name' => $validated['name'],
                'phone_number' => $validated['phone_number']
            ];
            $request->user()->update($date_user);

            $date_information = Arr::except($validated , ['name' , 'phone_number']);
            if ($request->hasFile('photo')) {
                $date_information['photo'] = $request->file('photo')->store('/photo_profile' , 'public');
            }
            $exists = Information::where('user_id' , $request->user()->id)->first();
            if ($exists) {
                $old = $exists->photo;
                $exists->update($date_information);
                $new = $exists->photo;
                if ($old && $old != $new) {
                    Storage::disk('public')->delete($old);
                }
            }else{
                $date_information['user_id'] = $request->user()->id;
                Information::create($date_information);
            }
            DB::commit();
            return redirect()->route('profile.view')->with('success' , 'ok');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('profile.view')->with('error' , 'no');
        }

    }
}
