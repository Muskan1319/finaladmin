<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userdetail;
use App\Models\userorder;
use Illuminate\Support\Facades\DB;

class usercontroller extends Controller
{
    public function adduserdetails(Request $req)
    {
           $val=$req->validate([
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=>'required|email',
                'phonenumber'=>'required|max:10|min:10',
                'address'=>'required',
                'city'=>'required',
                'state'=>'required',
                'pincode'=>'required',
             
            ]);
            if($val)
            {
                $data=new userdetail();
                $data->firstname=$req->firstname;
                $data->lastname=$req->lastname;
                $data->email=$req->email;
                $data->phonenumber=$req->phonenumber;
                $data->address=$req->address;
                $data->city=$req->city;
                $data->state=$req->state;
                $data->pincode=$req->pincode;
                $res=$data->save();
                if($res)
                {
                    return response()->json(['msg','User details added Successfully']);
                }
                else
                return response()->json('msg','User details not added ');
            }
    }

    public function adduserorder(Request $req)
    {
           $val=$req->validate([
                'useremail'=>'required|email',
                'product_id'=>'required',
                'price'=>'required',
                'quantity'=>'required',
                'total'=>'required',
             
            ]);
            if($val)
            {
                $data=new userorder();
                $data->useremail=$req->useremail;
                $data->product_id=$req->product_id;
                $data->price=$req->price;
                $data->quantity=$req->quantity;
                $data->total=$req->total;
                $res=$data->save();
                if($res)
                {
                    return response()->json(['msg','User details added Successfully']);
                }
                else
                return response()->json('msg','User details not added ');
            }
    }



}
