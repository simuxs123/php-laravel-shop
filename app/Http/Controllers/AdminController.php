<?php

namespace App\Http\Controllers;




use App\Order;
use App\Product;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products=Product::paginate(10);
        return view('admin.pages.home-admin',compact('products'));
    }
    public function addProduct()
    {
        return view('admin.pages.add-product');
    }

    public function store(Request $request){
        $validatedData=$request->validate([
            'title'=>'required|unique:products|max:255',
            'img'=>'required|max:10000',
            'content'=>'required',
            'category-name'=>'required',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required|integer'
]);
        $path = $request->file('img')->store('public/images');
        $filename=str_replace('public/',"",$path);
        Product::create([
            'title'=>request('title'),
            'price'=>floatval(request('price'))*100,
            'quantity'=>request('quantity'),
            'content'=>request('content'),
            'category_id'=>request('category-name'),
            'path'=>$filename,
            'user_id'=>Auth::id()
        ]);
        return redirect('/admin');
    }
    public function updateProduct(Product $product)
    {
        if(Gate::allows('updateProduct',$product)){
            return view('admin.pages.update-product',compact('product'));
        } else {
            return redirect('/admin');
        }
    }
    public function storeUpdate(Request $request,Product $product)
    {
        $validatedData=$request->validate([
            'title'=>'required|max:255|unique:products,title,'.$product->id,
            'content'=>'required',
            'category-name'=>'required',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required|integer'
        ]);
        if($request->file()){
            File::delete(storage_path('app/public/'.$product->path));
            $path = $request->img->store('public/images');
            $filename=str_replace('public/',"",$path);
            Product::where('id',$product->id)->update(['path'=>$filename]);
        }
        Product::where('id',$product->id)->update(
            [   'title'=>request('title'),
                'price'=>floatval(request('price'))*100,
                'quantity'=>request('quantity'),
                'content'=>request('content'),
                'category_id'=>request('category-name')
            ]);
        return redirect('/admin');
    }

    public function delete(Product $product){
        if(Gate::allows('delete',$product)){
            $product->delete();
            File::delete(storage_path('app/public/'.$product->path));
        }
        return redirect('/admin');
    }
    public function orders()
    {
        $orders=Order::all()->groupBy('status_id');
        return view('admin.pages.orders',compact('orders'));
    }
    public function updateStatus(Request $request)
    {

        $parduotas = Order::where('id', $request->id)->first();
        switch ($request->pav) {
            case 'new':
                $parduotas->status_id = 1;
                break;
            case 'prepare':
                $parduotas->status_id = 2;
                break;
            case 'sent':
                $parduotas->status_id = 3;
                break;
        }
        $parduotas->save();
        return back();
    }
}
