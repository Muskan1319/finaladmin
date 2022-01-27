<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;
use Illuminate\Support\Facades\DB;

class bannercontroller extends Controller
{
    public function Add(){
        return view('admin.addbanner');
        }
        public function sendbanner(Request $req){
            $val = $req->validate(
                [
                    'caption' => 'required|unique:banners',
                    'image'=>'required',
                ],
                [
                    'caption.required' => 'The  field is required',
    
                ]
            );
            if ($val) {
                $file = $req->file('image');
                $dest = public_path('/uploads');
                $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
                $file->move(public_path('/uploads'),$filename);
        
                $caption = $req->caption;
                $image= $req->image;
                $data = new banner();
                $data->caption = $caption;
                $data->image= $filename;
                if ($data->save()) {
                    return back()->with('error', 'Data Added Successfully!!!');
                } else
                    return back()->with('error', 'Data not Added');
            }
        }
        public function showdata(){
            $sel = banner::all();
            return view('admin.showbanner', compact('sel'));
    }
    // For delete Asset Type
    public function delete($id)
    {
        $data = banner::find($id)->delete();
        return redirect('/showbanner');
    }
    //for edit asset type
    public function edit($id)
        {
            $sel = banner::all()->where('id', $id);
            return view('admin.editbanner', compact('sel','id'));
        }
    
    
    //For data update
    public function update( $id,Request $req)
    {  // print_r($req->all());
        $val = $req->validate([
            'image' => 'required',
    
        ]);
        if ($val) {
            $data = banner::where('id' ,$id)->update([
                'caption' =>$req->caption,
                'image' => $req->image,
            ]);
           /* if ($data)  
           dd($data); */    
           return redirect('/showbanner');
        }
    }
    public function showban(){
        $sel = banner::all();
        return $sel;
}
}
