<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function shop()
   {
    $items=Item::OrderBy('id','DESC')->paginate(8);
   // var_dump($items);
     return view('front.shops',compact('items'));
   }
   public function shopItem($id)
   {
    $item=Item::find($id);
    return view ('front.shop-item',compact('item'));
   }
}