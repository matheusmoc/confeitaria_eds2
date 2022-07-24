<?php

namespace App\Http\Controllers\Bakery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product;

class SearchController extends Controller
{
    public function search_ajax(){
        
        $data = Product::search()->get();
 
        return view('Bakery.search-ajax',compact('data'));
    }
}
