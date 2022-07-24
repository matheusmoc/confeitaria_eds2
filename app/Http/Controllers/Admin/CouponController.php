<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Coupon;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $category = Category::orderBy('id','DESC')->get();
       $coupon = Coupon::orderBy('id','DESC')->get();
        return view('Admin.coupon.index_coupon',compact('coupon','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('category_type',1)->get();
        $product = Product::orderBy('id','DESC')->get();

        return view('Admin.coupon.create_coupon',compact('category','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = new Coupon();
        $coupon->ten_ct = $request->ten_ct;
        $coupon->loai_ct = $request->loai_ct;
        $coupon->muc_giam = $request->muc_giam;
        $coupon->nhom_sp = $request->nhom_sp;
        $coupon->ma_km = $request->ma_km;
        $coupon->san_pham = $request->san_pham;
        $coupon->so_luong = $request->so_luong;
        $coupon->tg_bat_dau = $request->tg_bat_dau;
        $coupon->tg_ket_thuc = $request->tg_ket_thuc;
        $coupon->save();

        return redirect()->route('Coupon.index')->with('status', 'Promoção lançada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::orderBy('id','DESC')->get();
        $coupon = Coupon::find($id);
        $product = Product::orderBy('id','DESC')->get();

        return view('Admin.coupon.view_coupon',compact('category','coupon','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
         $coupon = Coupon::find($id);
        $category = Category::where('category_type',1)->get();
        $product = Product::orderBy('id','DESC')->get();

        return view('Admin.coupon.edit_coupon',compact('category','coupon','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);

        $coupon->ten_ct = $request->ten_ct;
        $coupon->loai_ct = $request->loai_ct;
        $coupon->muc_giam = $request->muc_giam;
        $coupon->nhom_sp = $request->nhom_sp;
        $coupon->ma_km = $request->ma_km;
        $coupon->san_pham = $request->san_pham;
        $coupon->so_luong = $request->so_luong;
        $coupon->tg_bat_dau = $request->tg_bat_dau;
        $coupon->tg_ket_thuc = $request->tg_ket_thuc;
        $coupon->save();

        return redirect()->route('Coupon.index')->with('status', 'Atualização da promoção bem-sucedida');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::find($id)->delete();
        return redirect()->back()->with('status','Exclusão de promoção realizada com sucesso!!');
    }
}
