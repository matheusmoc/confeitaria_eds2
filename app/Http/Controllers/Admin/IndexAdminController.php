<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Bakery\Comment;
use App\Models\Bakery\DetailBill;
use App\Models\Bakery\Bill;
use App\Models\Bakery\Favorite;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class IndexAdminController extends Controller
{
    public function index(Request $request)
    {
        $order = Bill::where('status','new')->count();
        $user = User::all()->count();

        // $total = FacadesDB::table('bill')->sum('total');

        $bill = Bill::where('status','new')->get();
        if(request()->date_from && request()->date_to){
            $bill = Bill::where('status','new')->whereBetween('created_at',[request()->date_from,request()->date_to])->get();
        }

        return view('Admin.admin',compact('order','user','bill'));
    }
    
    public function comment()
    {
        $comment = Comment::all();
        $user = User::all();
        $product = Product::all();

        return view('Admin.comment.index_comment', compact('comment', 'user', 'product'));
    }
    
    public function delete_comment($id){

        Comment::find($id)->delete();
        return redirect()->back()->with('status','Exclusão de comentário bem-sucedida!');
    }

    public function favorite_cus(){
        $fav = Favorite::orderBy('id','DESC')->paginate(5);
        return view('Admin.favorite.index_favorite',compact('fav'));
    }

    public function customer(){
        $customer = User::orderBy('id','DESC')->paginate(5);
        return view('Admin.customer.index_customer',compact('customer'));
    }

    public function order(){

        $order = Bill::orderBy('id','DESC')->paginate(5);
        $detail_order = DetailBill::all();

        return view('Admin.order.index_order',compact('order','detail_order'));
    }

    public function order_show($id, Request $req){

        $order = Bill::find($id);
        $detail_order = DetailBill::where('id_bill', $order->id)->get();

        return view('Admin.order.detail_order',compact('order','detail_order'));
    }

    public function confirm_order(Request $request){

        $order = Bill::where('id',$request->id)->update(['status'=>$request->status]);

        return  response(['status'=> 'ok']);
    }
}