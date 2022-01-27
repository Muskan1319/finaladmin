<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactus;
use Illuminate\Support\Facades\DB;


class contactcontroller extends Controller
{
    public function Add(){
        return view('admin.addcontact');
        }
        public function sendcontact(Request $req){
            $val = $req->validate(
                [
                    'name' => 'required',
                    'email_id'=>'required',
                    'number'=>'required',
                    'message' => 'required|min:5|max:500',
                ],
                [
                    'title.required' => 'The  field is required',
    
                ]
            );
            if ($val) {
                $name = $req->name;
                $email_id = $req->email_id;
                $number = $req->number;
                $message = $req->message;
                $data = new contactus();
                $data->name = $name;
                $data->email_id= $email_id;
                $data->number = $number;
                $data->message = $message;
                if ($data->save()) {
                    return back()->with('error', 'Data Added Successfully!!!');
                } else
                    return back()->with('error', 'Data not Added');
            }
        }
        public function showdata(){
            $sel = contactus::all();
            return view('admin.showcontact', compact('sel'));
    }
    // For delete Asset Type
    public function delete($id)
    {
        $data = contactus::find($id)->delete();
        return redirect('/showcontact');
    }
    //for edit contact 
    public function edit($id)
        {
            $sel = contactus::all()->where('id', $id);
            return view('admin.editcontact', compact('sel','id'));
        }
    
    
    //For data update
    public function update( $id,Request $req)
    { //  print_r($req->all());
        $val = $req->validate([
            'name' => 'required',
            'email_id' => 'required',
            'number' => 'required',
            'message' => 'required',
    
        ]);
        if ($val) {
            $data = contactus::where('id' ,$id)->update([
                'name' => $req->name,
                'email_id' => $req->email_id,
                'number' => $req->number,
                'message' => $req->message,
            
            ]);
           /* if ($data)  
           dd($data); */    
           return redirect('/showcontact');
        }
    }
}
