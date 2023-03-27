<?php

use Illuminate\Support\Facades\Route;

//Following by the requirement
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InductionController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\AdminManagementController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */

Auth::routes();
/* Route::get('user-login',[UserController::class, 'index'])->name('user.login');
Route::post('user-privilege',[UserController::class, 'login'])->name('user.privilege');
Route::post('save-privilege',[UserController::class, 'savePrivileges'])->name('save.privilege');
Route::get('user-details',[UserController::class, 'userDetails'])->name('user.details');
Route::get('edit-user/{uId}',[UserController::class, 'editUser'])->name('edit.user');
Route::post('update-user',[UserController::class, 'updateUser'])->name('update.user');
Route::get('delete-user/{uId}',[UserController::class, 'deleteUser'])->name('delete.user');
 */
//Employee Operations
Route::any('/',[EmployeeController::class, 'index'])->name('sign.in');
Route::any('user-home',[EmployeeController::class, 'login'])->name('home.user');
Route::get('create-user',[EmployeeController::class, 'createUser'])->name('create.user');
Route::post('save-user',[EmployeeController::class, 'saveUser'])->name('save.user');
Route::any('employee-details',[EmployeeController::class, 'employeeDetails'])->name('employee.details');
Route::get('edit-user/{employeeId}',[EmployeeController::class, 'editEmployee'])->name('edit.employee');
Route::post('update-user',[EmployeeController::class, 'updateEmployee'])->name('update.employee');
Route::get('delete-user/{employeeId}',[EmployeeController::class, 'deleteEmployee'])->name('delete.employee');
/* Route::get('search-employee',[EmployeeController::class, 'searchEmployee'])->name('search.employee');
 */Route::get('forgot-password',[EmployeeController::class, 'forgotPassword'])->name('forgot.password');
 Route::get('forgot-username',[EmployeeController::class, 'forgotUsername'])->name('forgot.username');
  Route::any('username-mail',[EmployeeController::class, 'usernameMail'])->name('username.mail');
 Route::any('reset-username',[EmployeeController::class, 'resetUsername'])->name('reset.username');
 Route::any('password-mail',[EmployeeController::class, 'passwordMail'])->name('password.mail');
 Route::any('reset-password',[EmployeeController::class, 'resetPassword'])->name('reset.password');
 Route::any('new-username',[EmployeeController::class, 'newUsername'])->name('new.username');
 Route::any('new-password',[EmployeeController::class, 'newPassword'])->name('new.password');
  Route::get('email-check',[EmployeeController::class, 'emailCheck'])->name('email.check'); 
 Route::get('username-check',[EmployeeController::class, 'usernameCheck'])->name('username.check'); 
  Route::any('log-out',[EmployeeController::class, 'logOut'])->name('log.out');

 
//Employee Profile
/*Route::any('employee-profile',[ProfileController::class, 'index'])->name('employee.profile');
Route::any('file-upload',[ProfileController::class, 'fileUpload'])->name('file.upload');
Route::any('email-verification',[ProfileController::class, 'emailVerify'])->name('email.verify');
Route::post('confirm-account',[ProfileController::class, 'confirmAccount'])->name('confirm.account');
Route::get('admin-panel',[ProfileController::class, 'adminPanel'])->name('admin.panel');
Route::get('starter-checklist',[ProfileController::class, 'starterChecklist'])->name('starter.checklist');
Route::post('save-bank',[ProfileController::class, 'saveBank'])->name('save.bank');
Route::post('save-starter',[ProfileController::class, 'saveStarter'])->name('save.starter');
Route::post('save-health',[ProfileController::class, 'saveHealth'])->name('save.health');*/

Route::post('save-application',[ProfileController::class, 'saveApplication'])->name('save.application'); 

Route::any('user-dashboard',[ProfileController::class, 'showDashboard'])->name('user.dashboard');
Route::any('application-form',[ProfileController::class, 'showApplicationForm'])->name('application.form');
Route::any('test-click',[ProfileController::class, 'testClick'])->name('test.click');
Route::any('file-upload',[ProfileController::class, 'fileUpload'])->name('file.upload');
Route::get('save-education',[ProfileController::class, 'saveEducation'])->name('save.education');
Route::get('training-form',[ProfileController::class, 'showTrainingForm'])->name('training.form'); 
Route::get('reference-form',[ProfileController::class, 'showReferenceForm'])->name('reference.form'); 
Route::post('save-reference',[ProfileController::class, 'saveReference'])->name('save.reference'); 
Route::get('dbs-check',[ProfileController::class, 'showDbsCheck'])->name('dbs.check'); 
Route::post('save-dbs',[ProfileController::class, 'saveDBS'])->name('save.dbs'); 
Route::post('save-training',[ProfileController::class, 'saveTraining'])->name('save.training'); 
Route::get('save-work',[ProfileController::class, 'saveWork'])->name('save.work'); 


//Induction Section
Route::any('induction',[InductionController::class, 'induction'])->name('induction.employee');
Route::any('save-induction-initial',[InductionController::class, 'saveInductionInitial'])->name('save.induction1');
Route::any('induction-test',[InductionController::class, 'inductionTest'])->name('induction.test');
Route::any('induction-checklist',[ProfileController::class, 'inductionChecklist'])->name('induction.checklist');
Route::get('induction-phase2',[InductionController::class, 'inductionPhase2'])->name('induction.phase2');
Route::any('save-induction-phase2',[InductionController::class, 'saveInductionPhase2'])->name('save.inductionPhase2');
Route::get('induction-phase1-details',[InductionController::class, 'inductionPhase1Details'])->name('induction.phase1Details');
Route::get('confirm-induction/{inductionId}',[InductionController::class, 'confirmInduction'])->name('confirm.induction');
Route::get('attend-induction/{inductionId}',[InductionController::class, 'attendInduction'])->name('attend.induction');
Route::get('induction-phase2-details',[InductionController::class, 'inductionPhase2Details'])->name('induction.phase2Details');
Route::get('confirm-inductionPhase2/{inductionId}',[InductionController::class, 'confirmInductionPhase2'])->name('confirm.inductionPhase2');
Route::get('attend-inductionPhase2/{inductionId}',[InductionController::class, 'attendInductionPhase2'])->name('attend.inductionPhase2'); 
Route::get('cancel-induction/{inductionId}',[InductionController::class, 'cancelInduction'])->name('cancel.induction');
Route::get('cancel-inductionPhase2/{inductionId}',[InductionController::class, 'cancelInductionPhase2'])->name('cancel.inductionPhase2');

Route::any('add-induction-phase1',[InductionController::class, 'addInductionPhase1'])->name('induction.addphase1');
Route::any('add-induction-phase2',[InductionController::class, 'addInductionPhase2'])->name('induction.addphase2');
Route::any('add-induction-phase1-save',[InductionController::class, 'addInductionPhase1Save'])->name('add.inductionPhase1');
Route::any('add-induction-phase2-save',[InductionController::class, 'addInductionPhase2Save'])->name('add.inductionPhase2');
Route::get('search-induction',[InductionController::class, 'searchInduction'])->name('search.inductionUser');
Route::get('induction-list',[InductionController::class, 'inductionList'])->name('induction.list');
Route::get('search-induction-list',[InductionController::class, 'searchInductionList'])->name('search.inductionList');
Route::get('delete-induction/{inductionId}',[InductionController::class, 'deleteIndction'])->name('delete.induction');
Route::get('filter-induction',[InductionController::class, 'filterInduction'])->name('filter.induction');

//Application forms details operation
Route::any('bank-details',[ProfileController::class, 'bankDetails'])->name('bank.details');
Route::get('edit-bank/{employeeId}',[ProfileController::class, 'editBank'])->name('edit.bank');
Route::get('starter-checklist-details',[ProfileController::class, 'starterChecklistDetails'])->name('starterChecklist.details');
Route::get('edit-starter-checklist/{employeeId}',[ProfileController::class, 'editStarterChecklist'])->name('edit.starterChecklist');
Route::get('health-questionnaire-details',[ProfileController::class, 'healthQuestionnaireDetails'])->name('healthQuestionnaire.details');
Route::get('edit-health-questionnaire/{employeeId}',[ProfileController::class, 'editHealthQuestionnaire'])->name('edit.healthQuestionnaire');
Route::get('application-details',[ProfileController::class, 'applicationDetails'])->name('application.details');
//Route::get('edit-application/{employeeId}',[ProfileController::class, 'editApplication'])->name('edit.application');
Route::post('update-bank',[ProfileController::class, 'updateBank'])->name('update.bank');
Route::post('update-starter',[ProfileController::class, 'updateStarter'])->name('update.starter');
Route::post('update-health',[ProfileController::class, 'updateHealth'])->name('update.health');
Route::post('update-application',[ProfileController::class, 'updateApplication'])->name('update.application');

Route::get('document-details',[FileController::class, 'documentsDetails'])->name('documents.details');
Route::get('edit-documents/{employeeId}',[FileController::class, 'editDocuments'])->name('edit.documents');
Route::any('file-view',[FileController::class, 'fileView'])->name('file.view');

//File Uploading Section
Route::any('passport-upload',[FileController::class, 'passportUpload'])->name('passport.upload');
Route::any('brp-upload',[FileController::class, 'brpUpload'])->name('brp.upload');
Route::any('dbs-upload',[FileController::class, 'dbsUpload'])->name('dbs.upload');
Route::any('training-upload',[FileController::class, 'trainingUpload'])->name('training.upload');
Route::any('right-upload',[FileController::class, 'rightUpload'])->name('right.upload');

//Approve Section
Route::any('document-status',[ApproveController::class, 'documentStatus'])->name('document.status');
Route::any('approve-documents/{employeeId}',[ApproveController::class, 'approveDocuments'])->name('approve.documents');
Route::any('bank-status',[ApproveController::class, 'bankStatus'])->name('bank.status');
Route::any('approve-bank/{employeeId}',[ApproveController::class, 'approveBank'])->name('approve.bank');
Route::any('starter-status',[ApproveController::class, 'starterStatus'])->name('starter.status');
Route::any('approve-starter/{employeeId}',[ApproveController::class, 'approveStarter'])->name('approve.starter');
Route::any('health-status',[ApproveController::class, 'healthStatus'])->name('health.status');
Route::any('approve-health/{employeeId}',[ApproveController::class, 'approveHealth'])->name('approve.health');
Route::any('application-status',[ApproveController::class, 'applicationStatus'])->name('application.status');
Route::any('approve-application/{employeeId}',[ApproveController::class, 'approveApplication'])->name('approve.application');

Route::get('search-employee',[SearchController::class, 'searchEmployee'])->name('search.employee');
Route::get('search-bank-details',[SearchController::class, 'searchBankDetails'])->name('search.bankDetails');
Route::get('search-starter-details',[SearchController::class, 'searchStarterDetails'])->name('search.starterDetails');
Route::get('search-health-details',[SearchController::class, 'searchHealthDetails'])->name('search.healthDetails');
Route::get('search-application',[SearchController::class, 'searchApplication'])->name('search.application');
Route::get('search-training',[SearchController::class, 'searchTraining'])->name('search.training');
Route::get('search-application-details',[SearchController::class, 'searchApplicationDetails'])->name('search.applicationDetails');
Route::get('filter-employee',[SearchController::class, 'filterEmployee'])->name('filter.employee');
Route::get('filter-application',[SearchController::class, 'filterApplication'])->name('filter.application');
Route::get('filter-training',[SearchController::class, 'filterTraining'])->name('filter.training');
Route::get('filter-reference',[SearchController::class, 'filterReference'])->name('filter.reference');
Route::get('filter-dbs',[SearchController::class, 'filterDBS'])->name('filter.dbs');

Route::get('employee-list',[AdminController::class, 'employeeList'])->name('employee.list'); 
Route::get('employee-list',[AdminController::class, 'employeeList'])->name('employee.list'); 
Route::get('application-list',[AdminController::class, 'applicationList'])->name('application.list'); 
Route::get('training-list',[AdminController::class, 'trainingList'])->name('training.list'); 


Route::get('refrence-list',[ProfileController::class, 'referenceList'])->name('reference.list');
Route::get('view-reference/{employeeId}',[ProfileController::class, 'viewReferenceList'])->name('view.reference');
Route::post('update-reference}',[ProfileController::class, 'updateReference'])->name('update.reference');
Route::get('search-reference',[ProfileController::class, 'searchReference'])->name('search.referenceList');

Route::get('dbs-list',[ProfileController::class, 'dbsList'])->name('dbs.list');
Route::get('view-dbs/{employeeId}',[ProfileController::class, 'viewDBSList'])->name('view.dbs');
Route::post('update-dbs}',[ProfileController::class, 'updateDBS'])->name('update.dbs');
Route::get('search-dbs',[ProfileController::class, 'searchDBS'])->name('search.dbsList');

Route::get('view-user/{employeeId}',[ViewController::class, 'viewUser'])->name('view.user');
Route::get('view-application/{employeeId}',[ViewController::class, 'viewApplication'])->name('view.application');
Route::get('review-application',[profileController::class, 'reviewApplication'])->name('review.application');
Route::get('approve-application',[profileController::class, 'approveApplication'])->name('approve.application');

Route::get('view-training/{employeeId}',[ViewController::class, 'viewTraining'])->name('view.training');
Route::get('review-training',[profileController::class, 'reviewTraining'])->name('review.training');
Route::get('approve-training',[profileController::class, 'approveTraining'])->name('approve.training');

Route::get('review-reference',[profileController::class, 'reviewReference'])->name('review.reference');
Route::get('approve-reference',[profileController::class, 'approveReference'])->name('approve.reference');

Route::get('review-dbs',[profileController::class, 'reviewDBS'])->name('review.dbs');
Route::get('approve-dbs',[profileController::class, 'approveDBS'])->name('approve.dbs');

Route::get('edit-application',[EditController::class, 'editApplication'])->name('edit.application');
Route::post('update-application',[EditController::class, 'updateApplication'])->name('update.application');

Route::get('edit-reference',[EditController::class, 'editReference'])->name('edit.reference');
Route::post('update-reference',[EditController::class, 'updateReference'])->name('update.reference');

Route::get('all-documents',[ProfileController::class, 'allDocuments'])->name('all.documents');

Route::get('edit-profile',[EditController::class, 'editProfile'])->name('edit.profile');
Route::post('update-profile',[EditController::class, 'updateProfile'])->name('update.profile');
Route::get('show-health',[ProfileController::class, 'showHealth'])->name('show.health');
Route::post('save-health',[ProfileController::class, 'saveHealth'])->name('save.health');
Route::get('edit-health',[EditController::class, 'editHealth'])->name('edit.health');
Route::post('update-health',[EditController::class, 'updateHealth'])->name('update.health');
Route::get('update-education',[EditController::class, 'updateEducation'])->name('update.education');
Route::get('update-work',[EditController::class, 'updateWork'])->name('update.work');
Route::get('edit-dbs',[EditController::class, 'editDBS'])->name('edit.dbs');
Route::post('update-dbs',[EditController::class, 'updateDBS'])->name('update.dbs');
Route::get('health-list',[ProfileController::class, 'healthList'])->name('health.list');
Route::get('filter-health',[SearchController::class, 'filterHealth'])->name('filter.health');
Route::get('view-health/{employeeId}',[ProfileController::class, 'viewHealthList'])->name('view.health');
Route::get('review-health',[profileController::class, 'reviewHealth'])->name('review.health');
Route::get('approve-health',[profileController::class, 'approveHealth'])->name('approve.health');

Route::any('profile-photo',[EmployeeController::class, 'profilePhoto'])->name('profile.photo'); 
Route::any('update-photo',[EmployeeController::class, 'updatePhoto'])->name('update.photo'); 
Route::get('policy-agree',[EmployeeController::class, 'policyAgree'])->name('policy.agree');
Route::get('search-health',[ProfileController::class, 'searchHealth'])->name('search.health');

Route::get('policy-template',[TemplateController::class, 'policyTemplate'])->name('policy.template');
Route::get('email-template',[TemplateController::class, 'emailTemplate'])->name('email.template');
Route::get('save-policy',[TemplateController::class, 'savePolicy'])->name('save.policy');
Route::get('get-policy',[TemplateController::class, 'getPolicy'])->name('get.policy');
Route::get('get-email',[TemplateController::class, 'getEmail'])->name('get.email');
Route::get('save-email',[TemplateController::class, 'saveEmail'])->name('save.email');
Route::get('contract-template',[TemplateController::class, 'contractTemplate'])->name('contract.template');
Route::get('get-contract',[TemplateController::class, 'getContract'])->name('get.contract');
Route::get('save-contract',[TemplateController::class, 'saveContract'])->name('save.contract');

Route::get('bank-details',[ProfileController::class, 'showBankDetails'])->name('bank.details');
Route::post('save-bank',[ProfileController::class, 'saveBank'])->name('save.bank');
Route::get('edit-bank',[EditController::class, 'editBank'])->name('edit.bank');
Route::post('update-bank',[EditController::class, 'updateBank'])->name('update.bank');

Route::get('bank-list',[ProfileController::class, 'bankList'])->name('bank.list');
Route::get('search-bank',[ProfileController::class, 'searchBank'])->name('search.bank');
Route::get('filter-bank',[SearchController::class, 'filterBank'])->name('filter.bank');
Route::get('view-bank/{employeeId}',[ProfileController::class, 'viewBankList'])->name('view.bank');
Route::get('review-bank',[profileController::class, 'reviewBank'])->name('review.bank');
Route::get('approve-bank',[profileController::class, 'approveBank'])->name('approve.bank');

Route::get('starter-checklist',[ProfileController::class, 'showStarterChecklist'])->name('starter.checklist'); 
Route::post('save-starter',[ProfileController::class, 'saveStarter'])->name('save.starter');
Route::get('contract-form',[TemplateController::class, 'contractForm'])->name('contract.form');
Route::post('save-contractForm',[TemplateController::class, 'saveContractForm'])->name('save.contractForm');
Route::post('save-starterForm',[ProfileController::class, 'saveStarterForm'])->name('save.starterForm');
Route::get('edit-starterForm',[EditController::class, 'editStarterForm'])->name('edit.starterForm');
Route::post('update-starterForm',[EditController::class, 'updateStarterForm'])->name('update.starterForm');

Route::get('starter-list',[ProfileController::class, 'starterList'])->name('starter.list');
Route::get('filter-starter',[SearchController::class, 'filterStarter'])->name('filter.starter');
Route::get('search-starter',[SearchController::class, 'searchStarter'])->name('search.starter');
Route::get('view-starter/{employeeId}',[ProfileController::class, 'viewStarterList'])->name('view.starter');
Route::get('review-starter',[profileController::class, 'reviewStarter'])->name('review.starter');
Route::get('approve-starter',[profileController::class, 'approveStarter'])->name('approve.starter');

Route::get('get-posts',[TemplateController::class, 'getPosts'])->name('get.posts');
Route::get('payrate-template',[TemplateController::class, 'payRateTemplate'])->name('payrate.template');
Route::get('save-payRate',[TemplateController::class, 'savePayRate'])->name('save.payRate');
Route::get('contract-list',[profileController::class, 'contractList'])->name('contract.list');
Route::get('comment-contractUser',[profileController::class, 'commentContractUser'])->name('comment.contractUser');
Route::get('after-commentContract',[profileController::class, 'afterCommentContract'])->name('after.commentContract');
Route::get('submit-contractUser',[profileController::class, 'submitContractUser'])->name('submit.contractUser');
Route::get('after-submitContract',[profileController::class, 'afterSubmitContract'])->name('after.submitContract');
Route::get('employee-contractForm',[TemplateController::class, 'employeeContractForm'])->name('employee.contractForm');
Route::get('view-contract/{employeeId}',[ProfileController::class, 'viewContractList'])->name('view.contract');
Route::get('search-contract',[SearchController::class, 'searchContract'])->name('search.contract');
Route::get('filter-contract',[SearchController::class, 'filterContract'])->name('filter.contract');
Route::get('approve-contract',[profileController::class, 'approveContract'])->name('approve.contract');
Route::get('comment-contractAdmin',[profileController::class, 'commentContractAdmin'])->name('comment.contractAdmin');
Route::get('review-contract',[profileController::class, 'reviewContract'])->name('review.contract');

Route::get('induction-checklist',[profileController::class, 'inductionChecklist'])->name('induction.checklist');
Route::post('save-induction',[ProfileController::class, 'saveInduction'])->name('save.induction');
Route::get('checklist-list',[profileController::class, 'checklistList'])->name('checklist.list');
Route::get('view-checklist/{employeeId}',[ProfileController::class, 'viewChecklist'])->name('view.checklist');
Route::get('approve-checklist',[profileController::class, 'approveChecklist'])->name('approve.checklist');
Route::get('filter-checklist',[SearchController::class, 'filterChecklist'])->name('filter.checklist');
Route::get('search-checklist',[SearchController::class, 'searchChecklist'])->name('search.checklist');

Route::get('final-check',[profileController::class, 'finalCheck'])->name('final.check');
Route::get('view-finalCheck/{employeeId}',[ProfileController::class, 'viewFinalCheck'])->name('view.finalCheck');
Route::get('approve-finalCheck',[ProfileController::class, 'approveFinalCheck'])->name('approve.finalCheck'); 
Route::get('disApprove-finalCheck',[ProfileController::class, 'disApproveFinalCheck'])->name('disApprove.finalCheck'); 
Route::get('search-finalCheck',[SearchController::class, 'searchFinalCheck'])->name('search.finalCheck');

Route::any('admin-dashboard',[AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::post('filter-countUser',[AdminController::class, 'filterCountUser'])->name('filter.countUser');

Route::get('add-roles',[AdminManagementController::class, 'addRoles'])->name('add.roles'); 
Route::post('save-department',[AdminManagementController::class, 'saveDepartment'])->name('save.department');
Route::post('save-role',[AdminManagementController::class, 'saveRole'])->name('save.role');
Route::post('save-users',[AdminManagementController::class, 'saveUsers'])->name('save.users');
Route::get('add-users',[AdminManagementController::class, 'addUsers'])->name('add.users'); 
Route::get('delete-users',[AdminManagementController::class, 'deleteUsers'])->name('delete.users'); 
Route::get('get-role',[AdminManagementController::class, 'getRole'])->name('get.role');
Route::get('staff-list',[AdminManagementController::class, 'staffList'])->name('staff.list');
Route::get('edit-staff/{employeeId}',[AdminManagementController::class, 'editStaff'])->name('edit.staff');
Route::post('edit-department',[AdminManagementController::class, 'editDepartment'])->name('edit.department');
Route::post('edit-role',[AdminManagementController::class, 'editRole'])->name('edit.role');
Route::post('delete-department',[AdminManagementController::class, 'deleteDepartment'])->name('delete.department');
Route::post('delete-role',[AdminManagementController::class, 'deleteRole'])->name('delete.role');
Route::post('update-users',[AdminManagementController::class, 'updateUsers'])->name('update.users');
Route::get('get-name',[AdminManagementController::class, 'getName'])->name('get.name');
Route::get('search-staffList',[SearchController::class, 'searchStaffList'])->name('search.staffList');
Route::get('filter-staffList',[SearchController::class, 'filterStaffList'])->name('filter.staffList');
Route::get('delete-staff',[AdminManagementController::class, 'deleteStaff'])->name('delete.staff');
Route::get('deactivate-staff',[AdminManagementController::class, 'deactivateStaff'])->name('deactivate.staff');
Route::get('activate-staff',[AdminManagementController::class, 'activateStaff'])->name('activate.staff');

/* Route::get('induction-final',[InductionController::class, 'inductionFinal'])->name('induction1.employee');
Route::post('save-induction-initial',[InductionController::class, 'saveInductionInitial'])->name('save.induction1');
Route::post('save-induction-final',[InductionController::class, 'saveInductionFinal'])->name('save.inductionFinal');
Route::get('induction-list',[InductionController::class, 'inductionList'])->name('induction.list');
Route::get('confirm-induction/{inductionId}',[InductionController::class, 'confirmInduction'])->name('confirm.induction');
Route::get('attend-induction/{inductionId}',[InductionController::class, 'attendInduction'])->name('attend.induction');

Route::get('induction-phase2',[InductionController::class, 'inductionPhase2'])->name('induction.phase2');
Route::get('confirm-inductionPhase2/{inductionId}',[InductionController::class, 'confirmInductionPhase2'])->name('confirm.inductionPhase2');
Route::get('attend-inductionPhase2/{inductionId}',[InductionController::class, 'attendInductionPhase2'])->name('attend.inductionPhase2'); */

//Route::get('employee-induction',[ProfileController::class, 'employeeInduction'])->name('employee.induction');

/* Route::get('send-email',function(){
    $mailData = [
        "name" =>"Test Name",
        "dob" => "12/12/1990"
    ];

    Mail::to("hello@examle.com")->send(new TestMail($mailData));
    dd("Mail Sent Successfuly!");
}); */