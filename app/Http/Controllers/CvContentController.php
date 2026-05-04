<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursesRequest;
use App\Http\Requests\CoursesUpdateRequest;
use App\Http\Requests\EducationRequest;
use App\Http\Requests\EducationUpdateRequest;
use App\Http\Requests\LanguagesRequest;
use App\Http\Requests\LanguagesUpdateRequest;
use App\Http\Requests\ProfessionalExperienceRequest;
use App\Http\Requests\ProfessionalExperienceUpdateRequest;
use App\Http\Requests\SkillsRequest;
use App\Http\Requests\SkillsUpdateRequest;
use App\Http\Requests\SummaryRequest;
use App\Http\Requests\SummaryUpdateRequest;
use App\Models\CvContent;
use App\Services\Utilities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CvContentController extends Controller
{

    public function summary(SummaryRequest $request , Utilities $utilities)
    {
        $request->validated();
        $data = [
            'cv_id' => Auth::user()->cv->id,
            'type' => 'summary',
            'value' => $utilities->descriptionClean($request->input('summary_value'))
        ];

        $exists = CvContent::where('type' , 'summary')->exists();
        if (!$exists) {
            CvContent::create($data);
            return redirect()->route('profile.view')->with('success' , 'ok');
        }
        return redirect()->route('profile.view')->with('error' , 'no');
    }

    public function summaryUpdate(SummaryUpdateRequest $request , Utilities $utilities , $id)
    {
        $request->validated();
        $cv_content = CvContent::findOrFail($id);
        $data = [
            'cv_id' => Auth::user()->cv->id,
            'type' => 'summary',
            'value' => $utilities->descriptionClean($request->input('summary_value'))
        ];
        $cv_content->update($data);
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function summaryDelete($id)
    {
        $cv_content = CvContent::findOrFail($id);
        $cv_content->delete();
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function education(EducationRequest $request)
    {
        $request->validated();
        $data = [
            "value" => $request->input('education_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'education',
            "extensions" => json_encode([
                "education_education" => $request->input('education_education'),
                "education_adress" => $request->input('education_adress'),
                "education_start_date" => $request->input('education_start_date'),
                "education_end_date" => $request->input('education_end_date'),
                "education_gpa" => $request->input('education_gpa'),
                "education_file" => $request->file('education_file')->store('/Profile/Cv/Educations'),
            ])
        ];
        CvContent::create($data);
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function educationUpdate(EducationUpdateRequest $request , $id)
    {
        $cv_content = CvContent::findOrFail($id);
        $request->validated();
        $data = [
            "value" => $request->input('education_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'education',
            "extensions" => json_encode([
                "education_education" => $request->input('education_education'),
                "education_adress" => $request->input('education_adress'),
                "education_start_date" => $request->input('education_start_date'),
                "education_end_date" => $request->input('education_end_date'),
                "education_gpa" => $request->input('education_gpa'),
            ])
        ];
        if ($request->hasFile('education_file')) {
            $data['extensions'] = json_decode($data['extensions']);
            $data['extensions']->education_file = $request->file('education_file')->store('/Profile/Cv/Educations');
            $data['extensions'] = json_encode($data['extensions']);
            $old = json_decode($cv_content->extensions)->education_file;
            $cv_content->update($data);
            $new = json_decode($cv_content->extensions)->education_file;
            if ($old && $old != $new) {
                Storage::delete($old);
            }
        }else{
            $data['extensions'] = json_decode($data['extensions']);
            $data['extensions']->education_file  = json_decode($cv_content->extensions)->education_file;
            $data['extensions'] = json_encode($data['extensions']);
            $cv_content->update($data);
        }
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function educationDelete($id)
    {
        $cv_content = CvContent::findOrFail($id);
        $path = json_decode($cv_content->extensions)->education_file;
        $cv_content->delete();
        if($path){
            Storage::delete($path);
        }
        return redirect()->route('profile.view')->with('success' , 'ok');
    }


    public function skills(SkillsRequest $request)
    {
        $request->validated();
        $data = [
            "value" => $request->input('skills_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'skills',
        ];
        CvContent::create($data);
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function skillsUpdate(SkillsUpdateRequest $request , $id)
    {
        $cv_content = CvContent::findOrFail($id);
        $request->validated();
        $data = [
            "value" => $request->input('skills_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'skills',
        ];
        $cv_content->update($data);
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function skillsDelete($id)
    {
        $cv_content = CvContent::findOrFail($id);
        $cv_content->delete();
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function professionalExperience(ProfessionalExperienceRequest $request , Utilities $utilities)
    {
        $request->validated();
        $data = [
            "value" => $request->input('professional_experience_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'professionalExperience',
            "extensions" => json_encode([
                "professional_experience_start_date" => $request->input('professional_experience_start_date'),
                "professional_experience_end_date" => $request->input('professional_experience_end_date'),
                "professional_experience_adress" => $request->input('professional_experience_adress'),
                "professional_experience_description" => $utilities->descriptionClean($request->input('professional_experience_description')),
                "professional_experience_file" => $request->file('professional_experience_file')->store('/Profile/Cv/ProfessionalExperiences'),
            ])
        ];
        CvContent::create($data);
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function professionalExperienceUpdate(ProfessionalExperienceUpdateRequest $request , Utilities $utilities , $id)
    {
        $cv_content = CvContent::findOrFail($id);
        $request->validated();
        $data = [
            "value" => $request->input('professional_experience_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'professionalExperience',
            "extensions" => json_encode([
                "professional_experience_start_date" => $request->input('professional_experience_start_date'),
                "professional_experience_end_date" => $request->input('professional_experience_end_date'),
                "professional_experience_adress" => $request->input('professional_experience_adress'),
                "professional_experience_description" => $utilities->descriptionClean($request->input('professional_experience_description')),
            ])
        ];
        if ($request->hasFile('professional_experience_file')) {
            $data['extensions'] = json_decode($data['extensions']);
            $data['extensions']->professional_experience_file = $request->file('professional_experience_file')->store('/Profile/Cv/ProfessionalExperiences');
            $data['extensions'] = json_encode($data['extensions']);
            $old = json_decode($cv_content->extensions)->professional_experience_file;
            $cv_content->update($data);
            $new = json_decode($cv_content->extensions)->professional_experience_file;
            if ($old && $old != $new) {
                Storage::delete($old);
            }
        }else{
            $data['extensions'] = json_decode($data['extensions']);
            $data['extensions']->professional_experience_file  = json_decode($cv_content->extensions)->professional_experience_file;
            $data['extensions'] = json_encode($data['extensions']);
            $cv_content->update($data);
        }
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function professionalExperienceDelete($id)
    {
        $cv_content = CvContent::findOrFail($id);
        $path = json_decode($cv_content->extensions)->professional_experience_file;
        $cv_content->delete();
        if($path){
            Storage::delete($path);
        }
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function languages(LanguagesRequest $request)
    {
        $request->validated();
        $data = [
            "value" => $request->input('languages_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'languages',
            "extensions" => json_encode([
                "languages_level" => $request->input('languages_level'),
                "languages_file" => $request->hasFile('education_file') ? $request->file('languages_file')->store('/Profile/Cv/Languages') : null,
            ])
        ];
        CvContent::create($data);
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function languagesUpdate(LanguagesUpdateRequest $request , $id)
    {
        $cv_content = CvContent::findOrFail($id);
        $request->validated();
        $data = [
            "value" => $request->input('languages_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'languages',
            "extensions" => json_encode([
                "languages_level" => $request->input('languages_level'),
            ])
        ];
        if ($request->hasFile('languages_file')) {
            $data['extensions'] = json_decode($data['extensions']);
            $data['extensions']->languages_file = $request->file('languages_file')->store('/Profile/Cv/Languages');
            $data['extensions'] = json_encode($data['extensions']);
            $old = json_decode($cv_content->extensions)->languages_file;
            $cv_content->update($data);
            $new = json_decode($cv_content->extensions)->languages_file;
            if ($old && $old != $new) {
                Storage::delete($old);
            }
        }else{
            $data['extensions'] = json_decode($data['extensions']);
            $data['extensions']->languages_file  = json_decode($cv_content->extensions)->languages_file;
            $data['extensions'] = json_encode($data['extensions']);
            $cv_content->update($data);
        }
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function languagesDelete($id)
    {
        $cv_content = CvContent::findOrFail($id);
        $path = json_decode($cv_content->extensions)->languages_file;
        $cv_content->delete();
        if($path){
            Storage::delete($path);
        }
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function courses(CoursesRequest $request , Utilities $utilities)
    {
        $request->validated();
        $data = [
            "value" => $request->input('courses_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'courses',
            "extensions" => json_encode([
                "courses_place" => $request->input('courses_place'),
                "courses_start_date" => $request->input('courses_start_date'),
                "courses_end_date" => $request->input('courses_end_date'),
                "courses_file" => $request->file('courses_file')->store('/Profile/Cv/Courses'),
            ])
        ];
        CvContent::create($data);
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function coursesUpdate(CoursesUpdateRequest $request , Utilities $utilities , $id)
    {
        $cv_content = CvContent::findOrFail($id);
        $request->validated();
        $data = [
            "value" => $request->input('courses_value'),
            "cv_id" => Auth::user()->cv->id,
            "type" => 'courses',
            "extensions" => json_encode([
                "courses_place" => $request->input('courses_place'),
                "courses_start_date" => $request->input('courses_start_date'),
                "courses_end_date" => $request->input('courses_end_date'),
            ])
        ];
        if ($request->hasFile('file')) {
            $data['extensions'] = json_decode($data['extensions']);
            $data['extensions']->courses_file = $request->file('courses_file')->store('/Profile/Cv/Courses');
            $data['extensions'] = json_encode($data['extensions']);
            $old = json_decode($cv_content->extensions)->courses_file;
            $cv_content->update($data);
            $new = json_decode($cv_content->extensions)->courses_file;
            if ($old && $old != $new) {
                Storage::delete($old);
            }
        }else{
            $data['extensions'] = json_decode($data['extensions']);
            $data['extensions']->courses_file  = json_decode($cv_content->extensions)->courses_file;
            $data['extensions'] = json_encode($data['extensions']);
            $cv_content->update($data);
        }
        return redirect()->route('profile.view')->with('success' , 'ok');
    }

    public function coursesDelete($id)
    {
        $cv_content = CvContent::findOrFail($id);
        $path = json_decode($cv_content->extensions)->courses_file;
        $cv_content->delete();
        if ($path) {
            Storage::delete($path);
        }
        return redirect()->route('profile.view')->with('success' , 'ok');
    }
}
