<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cms;
use Illuminate\Support\Facades\DB;

class cmscontroller extends Controller
{
    public function Add(){
        return view('admin.addcms');
        }
        public function sendcms(Request $req){
            $val = $req->validate(
                [
                    'title' => 'required',
                    'description' => 'required|min:5|max:500',
                    'image'=>'required'
                ]
               /* [
                    'title.required' => 'The  field is required',
    
                ]*/
            );
            if ($val) {
                //print_r($req->file);die;
                $file = $req->file('image');
                $dest = public_path('/uploads');
                $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
                $file->move(public_path('/uploads'),$filename);
                
                $title = $req->title;
                $description = $req->description;
                $image=$req->image;
                $data = new cms();
                $data->title = $title;
                $data->description = $description;
                $data->image= $filename;
                if ($data->save()) {
                    return back()->with('error', 'Data Added Successfully!!!');
                } else
                    return back()->with('error', 'Data not Added');
            }
        }
        public function showdata(){
            $sel = cms::all();
            return view('admin.showcms', compact('sel'));
    }
    // For delete Asset Type
    public function delete($id)
    {
        $data =cms::find($id)->delete();
        return redirect('/showcms');
    }
    //for edit asset type
    public function edit($id)
        {
            $sel = cms::all()->where('id', $id);
            return view('admin.editcms', compact('sel','id'));
        }
    
    
    //For data update
    public function update( $id,Request $req)
    {   print_r($req->all());
        $val = $req->validate([
            'title' => 'required',
            'description'=>'required',
            'image'=>'required',
    
        ]);
        if ($val) {
            $data = cms::where('id' ,$id)->update([
                'title' => $req->title,
                'description' => $req->description,
                'image'=>$req->image,
            ]);
           /* if ($data)  
           dd($data); */    
           return redirect('/showcms');
        }
    }
    public function showcmsm(){
        $sel = cms::all();
        return $sel;
}
public function Cms($id)
{
    $sel=cms::all()->where('id',$id);
    return $sel;
}
}
