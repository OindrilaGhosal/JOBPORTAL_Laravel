<?php

namespace App\Http\Controllers;
use App\Profile;
//use App\Seeker;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function index() {
        return view('profile.index');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'phone_number' => 'required|max:10|numeric',
            'experience' => 'required',
            'bio' => 'required',
        ]);
        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'experience' => request('experience'),
            'bio' => request('bio'),
        ]);
        return redirect()->back()->with('message', 'Your Profile Updated Successfully');
    }
    public function coverletter(Request $request) {
        $this->validate($request, [
            'cover_letter' => 'required|mimes:pdf,doc,docx|max:20000',
        ]);

        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')
            ->store('public/files');
        Profile:: where('user_id',$user_id)->update([
            'cover_letter'=>$cover
        ]);
        return redirect()->back()->with('message', 'Cover Letter uploaded Successfully');
    }
    public function resume(Request $request) {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:20000',
        ]);

        $user_id = auth()->user()->id;
        $resume = $request->file('resume')
            ->store('public/files');
        Profile:: where('user_id',$user_id)->update([
            'resume'=>$resume
        ]);
        return redirect()->back()->with('message', 'Resume uploaded Successfully');
    }
    public function avatar(Request $request) {
        $this->validate($request, [
            'avatar' => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/avatar', $fileName);
            Profile::where('user_id',$user_id)->update([
                'avatar'=>$fileName
            ]);
            return redirect()->back()->with('message','Avatar Uploaded Successfully');
        }
    }
}
