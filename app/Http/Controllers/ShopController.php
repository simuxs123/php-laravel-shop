<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $products=Product::paginate(10);
        return view('shop.pages.home',compact('products'));
    }
    public function category(Category $category)
    {
        $products=Product::where('category_id', $category->id)->paginate(10);
        return view('shop.pages.home',compact('products'));
    }
    public function showProduct(Product $product)
    {
        return view('shop.pages.show-product',compact('product'));
    }
    public function checkout(Product $product)
    {
        return view('shop.pages.checkout',compact('product'));
    }
    public function storeOrder(Request $request, Product $product)
    {
        $validatedData=$request->validate([
            'vardas'=>'required|max:255',
            'pavarde'=>'required',
            'email'=>'email|required',
            'adresas'=>'required',
        ]);

        if($product->quantity>0){
            Order::create([
                'name'=>request('vardas'),
                'surname'=>request('pavarde'),
                'address'=>request('adresas'),
                'email'=>request('email'),
                'total_price'=>$product->price,
                'product_id'=>$product->id,
            ]);
            $product->quantity=$product->quantity-1;
            $product->save();
        } else {
            return back()->with('error','Prekių likutis nepakankamas');
        }

        return redirect('/')->with('success','Užsakymas įvygdytas sėkmingai');
    }
}
