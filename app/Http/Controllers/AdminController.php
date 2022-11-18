<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class AdminController extends Controller
{
    public function view_category()
    {
        return view('admin.category');
    }

    public function add_category(Request $request)
    {
        $data=new category;
        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message','Category Added Sucessfully');
       
    }

    public function view_product()
    {
        
        return view('admin.product');
    }

    public function add_product(Request $request)
    {
        $product=new product;
        $product->title=$request->title; //storing normal text data
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->dis_price;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension(); //giving image unique name using the time function
        $request->image->move('product',$imagename); //store image in the product folder thats in the public folder
        $product->image=$imagename;
        
        $product->save();
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        return redirect()->back()->with('message','Product Added Successfully');

    }

    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function update_product($id)

    {
        $product=product::find($id);
        return view('admin.update_product',compact('product'));
    }

    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->dis_price;

        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);

        $product->image=imagename;

        }
        
        $product->save();
        return redirect()->back()->with('message','Product Updated Successfully');
    }


}