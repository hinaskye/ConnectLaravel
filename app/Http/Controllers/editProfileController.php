<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
// use Illuminate\Support\Facades\Request as RequestOld;
use App\User;
use Auth;
use Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
class editProfileController extends Controller
{
    /**
    * Ensure only authenticated user access
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function imageUploadPost(Request $req)
    {
        $user = Auth::user();
        $userID = $user->id;
        $this->validate($req, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $userID;
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image = $req->file('image');
        $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
        //$imageName = Storage::disk('s3')->url($imageName);
        $imageName = $userID;
        return back()
            ->with('success','Image Uploaded successfully.')
            ->with('path',$imageName);
    }

    //For registration form
    public function  showEditForm(){
        return view('/profile');
    }

    public function update(Request $request){
        $user = Auth::user();
        $input = $request->all();
        if ($input['firstname'] == "")
        {
            $input['firstname'] = $user->firstname;
        }
        if ($input['lastname'] == "")
        {
            $input['lastname'] = $user->lastname;
        }
        if ($input['username'] == "")
        {
            $input['username'] = $user->username;
        }
        if ($input['gender'] == "")
        {
            $input['gender'] = $user->gender;
        }
        if ($input['email'] == "")
        {
            $input['email'] = $user->email;
        }
        if ($input['looking'] == "")
        {
            $input['looking'] = $user->looking;
        }
        if ($input['myedu'] == "")
        {
            $input['myedu'] = $user->myedu;
        }
        if ($input['matchingedu'] == "")
        {
            $input['matchingedu'] = $user->matchingedu;
        }

        if ($input['birthday'] == "")
        {
            $input['birthday'] = $user->birthday;
        }
        if ($input['q1'] == "")
        {
            $input['q1'] = $user->q1;
        }
        if ($input['q2'] == "")
        {
            $input['q2'] = $user->q2;
        }
        if ($input['q3'] == "")
        {
            $input['q3'] = $user->q3;
        }
        if ($input['q4'] == "")
        {
            $input['q4'] = $user->q4;
        }
        if ($input['q5'] == "")
        {
            $input['q5'] = $user->q5;
        }
        if ($input['q6'] == "")
        {
            $input['q6'] = $user->q6;
        }
        if ($input['q7'] == "")
        {
            $input['q7'] = $user->q7;
        }
        if ($input['q8'] == "")
        {
            $input['q8'] = $user->q8;
        }
        if ($input['q9'] == "")
        {
            $input['q9'] = $user->q9;
        }
        if ($input['q10'] == "")
        {
            $input['q10'] = $user->q10;
        }
        if ($input['aboutme'] == "")
        {
            $input['aboutme'] = $user->aboutme;
        }
        if ($input['postcode'] == "")
        {
            $input['postcode'] = $user->postcode;
        }

        $user->fill($input)->save();
        return view('/profile');
    }
}
