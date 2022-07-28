<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::where('category_type', '1')->get();
        $product = Product::orderBy('id', 'DESC')->search()->paginate(7);

        $image_list = Product::pluck('image_list')->toArray();
        $image = implode('', $image_list);
        $image2 = explode('|', $image);
        //dd($image2);
        return view('Admin.product.index_product', compact('product', 'category', 'image_list', 'image', 'image2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('category_type', '1')->get();
        return view('Admin.product.create_product', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|max:255',
                'slug' => 'required',
                'description' => 'required',
                'image' => 'required',
                'images' => 'required',
                'price' => 'required',
                'sale_price' => 'required',
                'category_id' => 'required',
                'status' => 'required',

            ],
            [
                'name.unique' => 'Nome do produto já disponível',
                'name.required' => 'O nome do produto não pode ficar em branco',
                'image.required' => 'A imagem não pode ficar em branco',
                'images.required' => 'As imagens relacionadas não podem ficar em branco',
                'price.required' => 'O preço não pode ficar em branco',

            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->percent_sale = $request->percent_sale;


        $file = $request->file("image");
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(\public_path("uploads/img/"), $imageName);
        $product->image = $imageName;

        $images = [];
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $imageNames = time() . '_' . $file->getClientOriginalName();
                $file->move(\public_path("uploads/img/"), $imageNames);
                $images[] = $imageNames;
            }
            $product->image_list = implode("|", $images);
            $product->save();
            return redirect()->route('Product.index')->with('status', 'Mais produtos de sucesso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $category = Category::where('category_type', '1')->get();

        $product = Product::find($id);
        $image_list = Product::select('image_list')->where('id', $id)->get();

        $image = $image_list->pluck('image_list')->toArray();
        $image2 = implode('|', $image);
        $images = explode('|', $image2);

        return view('Admin.product.view_product', compact('category', 'product', 'image_list', 'image', 'image2', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $category = Category::where('category_type', '1')->get();

        $product = Product::find($id);
        $image_list = Product::select('image_list')->where('id', $id)->get();

        $image = $image_list->pluck('image_list')->toArray();
        $image2 = implode('|', $image);
        $images = explode('|', $image2);
        //dd($images);



        return view('Admin.product.edit_product', compact('category', 'product', 'image', 'image2', 'images'));
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

        $request->validate(
            [
                'name' => 'required|max:255',
                'slug' => 'required',
                'description' => 'required',
                'price' => 'required',
                'sale_price' => 'required',
                'category_id' => 'required',
                'status' => 'required'
            ],

            [
                'name.unique' => 'Nome do produto já disponível',
                'name.required' => 'O nome do produto não pode ser oculto',
                'price.required' => 'O preço não pode ficar em branco',
            ]
        );

        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->percent_sale = $request->percent_sale;




        if ($request->hasFile('image')) {

            $destination = 'uploads/img/' . $product->image;

            if (File::exists($destination)) {
                File::delete($destination);
            } else {
                $file = $request->file("image");
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(\public_path("uploads/img/"), $imageName);
                $product->image = $imageName;
            }
        }



        //---------------------------------------------------------

        if ($request->hasFile('images')) {
            $destination = 'uploads/img/' . $product->image_list;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        $images = [];
        $file = $request->file("images");
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $imageNames = time() . '_' . $file->getClientOriginalName();
                $file->move(\public_path("uploads/img/"), $imageNames);
                $images[] = $imageNames;
            }
            $product->image_list = implode("|", $images);
        }

        $product->update();
        return redirect()->route('Product.index')->with('status', 'Editar o produto com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('status', 'Excluir produto com sucesso');
    }
}
