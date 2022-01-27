<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\configuration;
use Illuminate\Support\Facades\DB;

class configcontroller extends Controller
{
    public function Add(){
        return view('admin.addconfig');
        }
        public function sendconfig(Request $req){
            $val = $req->validate(
                [
                    'emailid' => 'required|unique:configurations',
                ],
                [
                    'emailid.required' => 'The  field is required',
    
                ]
            );
            if ($val) {
                $emailid = $req->emailid;
                $data = new configuration();
                $data->emailid = $emailid;
                if ($data->save()) {
                    return back()->with('error', 'Data Added Successfully!!!');
                } else
                    return back()->with('error', 'Data not Added');
            }
        }
        public function showdata(){
            $sel = configuration::all();
            return view('admin.showconfig', compact('sel'));
    }
    // For delete Asset Type
    public function delete($id)
    {
        $data = configuration::find($id)->delete();
        return redirect('/showconfig');
    }
    //for edit asset type
    public function edit($id)
        {
            $sel = configuration::all()->where('id', $id);
            return view('admin.editconfig', compact('sel','id'));
        }
    
    
    //For data update
    public function update( $id,Request $req)
    {  // print_r($req->all());
        $val = $req->validate([
            'emailid' => 'required',
    
        ]);
        if ($val) {
            $data = configuration::where('id' ,$id)->update([
                'emailid' => $req->emailid,
                
            ]);
           /* if ($data)  
           dd($data); */    
           return redirect('/showconfig');
}
}
}
