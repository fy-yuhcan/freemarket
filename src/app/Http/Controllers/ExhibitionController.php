<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exhibition;
use App\Models\Category;
use App\Models\Item;
use App\Http\Requests\ExhibitionRequest;
use Illuminate\Support\Facades\Storage;

class ExhibitionController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('add', compact('categories'));
    }

    public function add(ExhibitionRequest $request)
    {
        $path = $request->file('product_image')->store('product_images', 'public');

        $item = new Item();
        $item->user_id = auth()->id();
        $item->category_id = $request->category_id;
        $item->condition = $request->condition;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $path;
        $item->save();

        $exhibition = new Exhibition();
        $exhibition->item_id = $item->id;
        $exhibition->user_id = auth()->id();
        $exhibition->sold = false;
        $exhibition->save();

        return redirect()->route('mypage')->with('status', '商品を出品しました');
    }
}

