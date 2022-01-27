<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class categorycontroller extends Controller
{
    public function Add(){
        return view('admin.addcategory');
        }
        public function senddata(Request $req){
            $val = $req->validate(
                [
                    'title' => 'required|unique:categories',
                    'description' => 'required|min:5|max:500',
                ],
                [
                    'title.required' => 'The  field is required',
    
                ]
            );
            if ($val) {
                $title = $req->title;
                $description = $req->description;
                $data = new category();
                $data->title = $title;
                $data->description = $description;
                if ($data->save()) {
                    return back()->with('error', 'Data Added Successfully!!!');
                } else
                    return back()->with('error', 'Data not Added');
            }
        }
        public function showdata(){
            $sel = category::all();
            return view('admin.showcategory', compact('sel'));
    }
    // For delete Asset Type
    public function delete($id)
    {
        $data = category::find($id)->delete();
        return redirect('/showcategory');
    }
    //for edit asset type
    public function edit($id)
        {
            $sel = category::all()->where('id', $id);
            return view('admin.editcategory', compact('sel','id'));
        }
    
    
    //For data update
    public function update( $id,Request $req)
    {   print_r($req->all());
        $val = $req->validate([
            'title' => 'required',
    
        ]);
        if ($val) {
            $data = category::where('id' ,$id)->update([
                'title' => $req->title,
                'description' => $req->description,
            ]);
           /* if ($data)  
           dd($data); */    
           return redirect('/showcategory');
        }
    }


    public function showcat(){
        $sel = category::all();
        return $sel;
}
}



