<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CvContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\UtilitiesController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\IssuingACertificateOfTrainingController;
use App\Http\Controllers\IssuingACvPdfController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\WalletController;
use App\Models\Attachment;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');

    //contactUs
    Route::post('/contactUs' , [ContactUsController::class , 'contactUs'])->name('contactUs');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});



Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('/profile/view/{user}', [ProfileController::class, 'viewTo'])->name('profile.viewTo');
    Route::get('/profile/viewFile/{model}/{id}/{field}/{isJson?}/{otherField?}/{isPrivate?}', [UtilitiesController::class, 'viewFile'])->name('utilities.viewFile');
    Route::post('/profile/cv/overview' , [InformationController::class , 'overview'])->name('profile.cv.overview');
    Route::post('/profile/cv/summary', [CvContentController::class, 'summary'])->name('profile.cv.summary');
    Route::put('/profile/cv/summaryUpdate/{id}', [CvContentController::class, 'summaryUpdate'])->name('profile.cv.summary.update');
    Route::delete('/profile/cv/summaryDelete/{id}', [CvContentController::class, 'summaryDelete'])->name('profile.cv.summary.delete');
    Route::post('/profile/cv/education', [CvContentController::class, 'education'])->name('profile.cv.education');
    Route::put('/profile/cv/educationUpdate/{id}', [CvContentController::class, 'educationUpdate'])->name('profile.cv.education.update');
    Route::delete('/profile/cv/educationDelete/{id}', [CvContentController::class, 'educationDelete'])->name('profile.cv.education.delete');
    Route::post('/profile/cv/skills', [CvContentController::class, 'skills'])->name('profile.cv.skills');
    Route::put('/profile/cv/skillsUpdate/{id}', [CvContentController::class, 'skillsUpdate'])->name('profile.cv.skills.update');
    Route::delete('/profile/cv/skillsDelete/{id}', [CvContentController::class, 'skillsDelete'])->name('profile.cv.skills.delete');
    Route::post('/profile/cv/professionalExperience', [CvContentController::class, 'professionalExperience'])->name('profile.cv.professionalExperience');
    Route::put('/profile/cv/professionalExperienceUpdate/{id}', [CvContentController::class, 'professionalExperienceUpdate'])->name('profile.cv.professionalExperience.update');
    Route::delete('/profile/cv/professionalExperienceDelete/{id}', [CvContentController::class, 'professionalExperienceDelete'])->name('profile.cv.professionalExperience.delete');
    Route::post('/profile/cv/languages', [CvContentController::class, 'languages'])->name('profile.cv.languages');
    Route::put('/profile/cv/languagesUpdate/{id}', [CvContentController::class, 'languagesUpdate'])->name('profile.cv.languages.update');
    Route::delete('/profile/cv/languagesDelete/{id}', [CvContentController::class, 'languagesDelete'])->name('profile.cv.languages.delete');
    Route::post('/profile/cv/courses', [CvContentController::class, 'courses'])->name('profile.cv.courses');
    Route::put('/profile/cv/coursesUpdate/{id}', [CvContentController::class, 'coursesUpdate'])->name('profile.cv.courses.update');
    Route::delete('/profile/cv/coursesDelete/{id}', [CvContentController::class, 'coursesDelete'])->name('profile.cv.courses.delete');


    //Project
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

    //Task
    Route::get('/task', [TaskController::class, 'index'])->name('task.index');
    Route::get('/project/{project}/task/{task}', [TaskController::class, 'show'])->name('task.show');
    Route::post('/project/{project}/task', [TaskController::class, 'store'])->name('task.store');
    Route::put('/project/{project}/task/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/project/{project}/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');


    //Delivery
    Route::post('/project/{project}/task/{task}/delivery', [DeliveryController::class, 'store'])->name('delivery.store');
    Route::put('/project/{project}/delivery/{delivery}', [DeliveryController::class, 'update'])->name('delivery.update');

    //Message
    Route::resource('/message' , MessageController::class);


    //Wallet
    Route::get('/wallet' , [WalletController::class , 'index'])->name('wallet.index');

    //Evaluation
    Route::post('/user/evaluation' , [EvaluationController::class , 'userEvaluation'])->name('user.evaluation');
    Route::delete('/user/evaluation/{evaluation}' , [EvaluationController::class , 'userEvaluationDelete'])->name('user.evaluation.delete');

    //Transaction
    Route::post('/deposit' , [TransactionController::class , 'deposit'])->name('transaction.deposit');
    Route::get('/selectAmount' , [TransactionController::class , 'selectAmount'])->name('transaction.selectAmount');
    Route::get('/succeeded' , [TransactionController::class , 'completed'])->name('transaction.succeeded');
    Route::get('/failure' , [TransactionController::class , 'canceled'])->name('transaction.failure');
    Route::post('/webhook' , [TransactionController::class , 'handle'])->name('transaction.webhook');

    //UserTask
    Route::post('/user/project/{project_id}/task/{task_id}' , [UserTaskController::class , 'add'])->name('user.task.add');

    //IssuingACertificateOfTraining
    Route::get('/issuingACertificateOfTraining' , [IssuingACertificateOfTrainingController::class , 'issuingACertificateOfTraining'])->name('issuingACertificateOfTraining');
    Route::get('/showACertificateOfTraining' , [IssuingACertificateOfTrainingController::class , 'showACertificateOfTraining'])->name('showACertificateOfTraining');

    //IssuingACvPdfController
    Route::get('/issuingACvPdfController' , [IssuingACvPdfController::class , 'issuingACvPdf'])->name('IssuingACvPdf');

    //attachments
    Route::put('/attachment/update/{id}' , [AttachmentController::class , 'update'])->name('attachment.update');
    Route::delete('/attachment/destroy/{id}' , [AttachmentController::class , 'destroy'])->name('attachment.destroy');

    //Comments
    Route::post('/project/{project}/comment', [CommentController::class, 'storeProject'])->name('comment.project.store');
    Route::post('/project/{project}/task/{task}/comment', [CommentController::class, 'storeTask'])->name('comment.task.store');
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

});

//Dashboard

Route::get('/dashboard', [DashboardController::class , 'index'])->middleware(['auth', 'verified'])->name('dashboard');
