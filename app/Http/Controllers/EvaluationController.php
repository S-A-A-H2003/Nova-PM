<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluationRequest;
use App\Models\Evaluation;
use App\Services\Utilities;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class EvaluationController extends Controller
{

    public function userEvaluation(EvaluationRequest $request , Utilities $utilities)
    {
        if (Auth::id() == $request->input('recipient')) {
             return back()->with('error' , 'cannt your self comment.');
        }
        $request->validated();
        $exists = Evaluation::where('user_id' , Auth::id())->where('evaluationable_id' , $request->input('recipient'))->first();
        $rate = 0;
        if ($request->input('rate')) {
            foreach ($request->input('rate') as $value) {
                if ($value == 'on') {
                    $rate++;
                }
            }
        }
        if (isset($exists)) {
            $exists->update([
                    'rate' => $rate,
                    'comment' => $utilities->descriptionClean($request->input('comment')),
            ]);
            return back()->with('success' , 'updated');

        }
        Evaluation::create([
            'evaluationable_type' => 'App\Models\User',
            'evaluationable_id' => $request->input('recipient'),
            'user_id' => Auth::id(),
            'rate' => $rate,
            'comment' => $utilities->descriptionClean($request->input('comment')),
        ]);

        return back()->with('success' , 'created');

    }

    public function userEvaluationDelete(Evaluation $evaluation)
    {
        $evaluation->delete();
        return back()->with('success' , 'ok');

    }

}
