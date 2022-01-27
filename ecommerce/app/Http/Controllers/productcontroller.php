<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class productcontroller extends Controller
{
    public function Add(){
        $sel=category::all();
        return view('admin.addproduct',compact('sel'));
        }
        public function sendproduct(Request $req){
            $val = $req->validate(
                [
                    'productname' => 'required',
                    'desc'=>'required',
                    'brand'=>'required',
                    'quantity1'=>'required',
                    'price'=>'required',
                    'image1'=>'required',
                ],
               
            );
            if ($val) {
                $file = $req->file('image1');
                $dest = public_path('/uploads');
                $filename = "Image-" . rand() . "-" . time() . "." . $file->extension();
                $file->move(public_path('/uploads'),$filename);
        
                $productname = $req->productname;
                $desc = $req->desc;
                $brand = $req->brand;
                $quantity1 = $req->quantity1;
                $price = $req->price;
                $category_id=$req->category_id;
                $image1= $req->image1;
                $data = new product();
                $data->productname = $productname;
                $data->desc = $desc;
                $data->brand = $brand;
                $data->quantity1 = $quantity1;
                $data->price = $price;
                $data->category_id=$category_id;
                $data->image1= $filename;
                if ($data->save()) {
                    return back()->with('error', 'Data Added Successfully!!!');
                } else
                    return back()->with('error', 'Data not Added');
            }
        }

    public function showdata(){
            $sel = product::all();
            return view('admin.showproduct', compact('sel'));
    }
    // For delete Asset Type
    public function delete($id)
    {
        $data = product::find($id)->delete();
        return redirect('/showproduct');
    }
    //for edit 
    public function edit($id)
        {
           $cat=category::all();
            $sel = product::where('id', $id)->get();
return view('admin.editproduct', compact('sel','id','cat'));
        }
    
    
    //For data update
    public function update( $id,Request $req)
    {   
        $val = $req->validate([
            'desc'=>'required',
            'brand'=>'required',
            'quantity1'=>'required',
            'price'=>'required',
            'image1' => 'required',
    
        ]);
        if ($val) {
            $data = product::where('id' ,$id)->update([
                'productname' =>$req->productname,
                'desc' => $req->desc,
                'brand' => $req->brand,
                'quantity1' =>$req->quantity1,
                'price' => $req->price,
                'image1' => $req->image1,
                'category_id'=>$req->category_id,
            ]);     
           return redirect('/showproduct');
        }
        
    }

    public function showpro(){
        $sel = product::all();
        return $sel;
    }
    public function sendid($id){
        $data=product::all()->where('category_id',$id);
        return $data;
    }
}
