<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editing;
use App\Models\User;
use Illuminate\Auth\Events\Validated;

class EditingController extends Controller
{
    //
    public function view(){
        return view('ck');
    }
    //insert
    public function insert(Request $request){
        $request->validate( //validation
            [
                'title' => 'required',
                'desc' => 'required'

            ]
        );
     $insert = new Editing();
     if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $insert->image = $imageName;
    }
    else{
        $insert->image='no-image.png';
    }
     $insert->title = $request['title'];
     $insert->desc = $request['desc'];
     $insert->user_id = auth()->user()->id;
     $insert->save();
     return redirect('/')->with('message','New record created successfully');

    }
    //read
    public function read(Request $request){
        $search = $request['search']?? "";
        if($search != ''){
        $read = Editing::where('title','LIKE','%'.$search.'%')->where('user_id', auth()->user()->id)->paginate(6);
        }else{
            $read = Editing::where('user_id', auth()->user()->id)->paginate(6);
        }
                return view('welcome',compact('read','search'));
        
    }
    //edit
    public function edit($id){
        $edits = Editing::where('id', $id)->where('user_id', auth()->user()->id)->firstOrFail();
        return view('edit',compact('edits'));
    }
    public function update(Request $request){
       $update = Editing::findOrFail($request->id);
       if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $update-> image =$imageName;
    }
       $update->title =$request['title'];
       $update->desc =$request['desc'];
       $update->save();
       return redirect('/')->with('message','record updated successfully');
    }

    public function delete($id){
        $delete = Editing::find($id);
        $delete->delete();
        return redirect('/')->with('message','record deleted successfully');
    }
    public function reading($id){
        $reading = Editing::where('id', $id)->where('user_id', auth()->user()->id)->firstOrFail();
        return view('reading',compact('reading'));

    }
}
