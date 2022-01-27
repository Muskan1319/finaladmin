<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupon;
use Illuminate\Support\Facades\DB;

class couponcontroller extends Controller
{
    public function Add(){
        return view('admin.addcoupon');
        }
        public function sendcoupon(Request $req){
            $val = $req->validate(
                [
                    'coupon_code' => 'required|unique:coupons',
                    'quantity' => 'required|min:1|max:3',
                    'coupon_value' => 'required|unique:coupons',
                ],
                [
                    'title.required' => 'The  field is required',
    
                ]
            );
            if ($val) {
                $coupon_code = $req->coupon_code;
                $quantity = $req->quantity;
                $coupon_value = $req->coupon_value;

                $data = new coupon();
                $data->coupon_code = $coupon_code;
                $data->quantity=$quantity;
                $data->coupon_value = $coupon_value;
                if ($data->save()) {
                    return back()->with('error', 'Data Added Successfully!!!');
                } else
                    return back()->with('error', 'Data not Added');
            }
        }
        public function showdata(){
            $sel = coupon::all();
            return view('admin.showcoupon', compact('sel'));
    }
    // For delete Asset Type
    public function delete($id)
    {
        $data = coupon::find($id)->delete();
        return redirect('/showcoupon');
    }
    //for edit asset type
    public function edit($id)
        {
            $sel = coupon::all()->where('id', $id);
            return view('admin.editcoupon', compact('sel','id'));
        }
    
    
    //For data update
    public function update( $id,Request $req)
    {  // print_r($req->all());
        $val = $req->validate([
            'coupon_code' => 'required',
            'quantity' => 'required',
            'coupon_value'=>'required',
    
        ]);
        if ($val) {
            $data = coupon::where('id' ,$id)->update([
                'coupon_code' => $req->coupon_code,
                'quantity'=>$req->quantity,
                'coupon_value' => $req->coupon_value,
            ]);
           /* if ($data)  
           dd($data); */    
           return redirect('/showcoupon');
        }
    }
    public function applycoupon(Request $req)
    {
        $coupon=coupon::where('coupon_code',$req->coupon_code)->first();
        if(!$coupon)
        {
            return response()->json(['msg'=>'Invalid Coupon code']);
        }
    
        return response()->json(['msg'=>'Coupon Applied successfully',"coupon_value"=>$coupon->coupon_value]);
        // $data=coupon::all();
      
    }
}
