<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id, Company $company)
    {
        return view('company.index', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'website' => 'required',
            'slogan' => 'required',
            'description' => 'required',
            'phone' => 'required|min:10|numeric'
        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'phone' => request('phone'),
            'description' => request('description'),
        ]);
        return redirect()->back()->with('message', 'Your Company Updated Successfully');
    }

    public function coverphoto(Request $request)
    {
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_photo')
            ->store('public/files');
        Company::where('user_id', $user_id)->update([
            'cover_photo' => $cover
        ]);
        return redirect()->back()->with('message', 'Cover Image uploaded Successfully');
    }

    public function logo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);
        $user_id = auth()->user()->id;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $text;
            $file->move('uploads/avatar', $fileName);
            Company::where('user_id', $user_id)->update([
                'logo' => $fileName
            ]);
            return redirect()->back()->with('message', 'Logo Uploaded Successfully');
        }
    }
}
