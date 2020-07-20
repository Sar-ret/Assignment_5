<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;
use App\Category;
use App\Product;
use App\assets;
use App\Review;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $features = Feature::get()->random(1);
        $pro = DB::table('products')
                    ->join('assets','products.id','=','assets.product_id')
                    ->select('products.*', 'assets.resource_path')
                    ->get();


        // dd($pro);

        return view('index', compact('categories', 'features', 'pro'));
    }

    public function detail(Request $request, $id){
        $categories = Category::all();
        $features = Feature::get()->random(1);
        $product = DB::table('products')
                    ->join('assets','products.id','=','assets.product_id')
                    ->select('products.*', 'assets.resource_path')
                    ->where('products.id', $id)
                    ->get();
        $t = DB::table('product_tag')
        ->join('tags','product_tag.tag_id','=','tags.id')
        ->select('tags.name')
        ->where('product_tag.tag_id', $id)
        ->get();
        $comment = Review::where('product_id', $id)->get();
        return view('products_detail', compact('categories', 'features', 'product','t', 'comment'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = new Review();
        $comment->content = $request['comment'];
        $comment->product_id = $id;
        $comment->written_at = now();
        $comment->save();

        // dd($comment);

        return redirect()->back();
    }
}
