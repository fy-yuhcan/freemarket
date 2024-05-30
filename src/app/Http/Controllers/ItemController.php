<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * 商品一覧を表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 商品一覧を取得（ページネーションなどを使用）
        $items = Item::paginate(10);
        
        // 商品一覧ビューを表示
        return view('index', compact('items'));
    }

    /**
     * 特定の商品を表示
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // 商品をIDで取得
        $item = Item::findOrFail($id);

        // 商品詳細ビューを表示
        return view('items.show', compact('item'));
    }

    /**
     * 認証ユーザーのマイリストを表示
     *
     * @return \Illuminate\View\View
     */
    public function mylist()
    {
        // 認証ユーザーの出品した商品を取得
        $items = auth()->user()->items()->paginate(10);

        // マイリストビューを表示
        return view('items.mylist', compact('items'));
    }
}

