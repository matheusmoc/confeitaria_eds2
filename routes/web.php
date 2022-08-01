<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CouponController;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bakery\IndexBakeryController;
use App\Http\Controllers\Bakery\SearchController;
use App\Http\Controllers\Bakery\SocialController;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('Admin.index');
// });


//------------------- Admin--------------------------------

Route::prefix('/Admin')->group(function(){

     Route::resource('/', IndexAdminController::class);
     Route::get('/Admin',[IndexAdminController::class,'index']);

    Route::resource('/Category', CategoryController::class);
    Route::get('/Category',[CategoryController::class,'index'])->name('Category.index');
    Route::get('/Category/Create',[CategoryController::class,'Create'])->name('Category.Create.create');

    Route::resource('/Product', ProductController::class);
    Route::get('/Product',[ProductController::class,'index'])->name('Product.index');
    Route::get('/Product/Create',[ProductController::class,'Create'])->name('Product.Create.create');

    Route::resource('/Slider', SliderController::class);
    Route::get('/Slider',[SliderController::class,'index'])->name('Slider.index');
    Route::get('/Slider/Create',[SliderController::class,'Create'])->name('Slider.Create.create');

    Route::resource('/Blog', BlogController::class);
    Route::get('/Blog',[BlogController::class,'index'])->name('Blog.index');
    Route::get('/Blog/Create',[BlogController::class,'Create'])->name('Blog.Create.create');

    Route::resource('/Coupon', CouponController::class);
    Route::get('/Coupon',[CouponController::class,'index'])->name('Coupon.index');
    Route::get('/Coupon/Create',[CouponController::class,'Create'])->name('Coupon.Create.create');

    Route::get('/Comment',[IndexAdminController::class,'comment'])->name('Comment.index');
    Route::get('/Comment/{id}',[IndexAdminController::class,'delete_comment'])->name('delete_comment');

    Route::get('/Favorite',[IndexAdminController::class,'favorite_cus'])->name('Favorite.favorite_cus');

    Route::get('/Customer',[IndexAdminController::class,'customer'])->name('Customer.customer');

    Route::get('/Order',[IndexAdminController::class,'order'])->name('Order.order');
    Route::get('/Order/{id}',[IndexAdminController::class,'order_show'])->name('Order.show');

    Route::get('/Comfirm-order',[IndexAdminController::class,'confirm_order'])->name('confirm_order');


});

//-----------------------Bakery---------------------------------





    Route::prefix('/')->group(function(){
        Route::resource('', IndexBakeryController::class);

        Route::get('/',[IndexBakeryController::class,'index'])->name('index');

        Route::get('/produtos',[IndexBakeryController::class,'product'])->name('product');
        Route::get('/blog',[IndexBakeryController::class,'blog'])->name('blog');
        Route::get('/contato',[IndexBakeryController::class,'contact'])->name('contact');

        Route::get('/detalhe-produto/{id}/{slug}',[IndexBakeryController::class,'detail_product']);

        Route::get('/detalhe-blog/{id}/{slug}',[IndexBakeryController::class,'detail_blog']);


         Route::get('/produtos/search',[IndexBakeryController::class,'search_ajax'])->name('search_ajax');

         Route::get('/categorias/{id}',[IndexBakeryController::class,'category_ajax'])->name('category_ajax');

         Route::get('/pedidos/{id}',[IndexBakeryController::class,'select_ajax'])->name('select_ajax');

        Route::get('/preços/{id}',[IndexBakeryController::class,'price_ajax'])->name('price_ajax');

        Route::get('/pesquisar-produto/procurar',[IndexBakeryController::class,'search_product'])->name('search_product');

        Route::get('/blog/procurar',[IndexBakeryController::class,'search_blog'])->name('search_blog');

        Route::get('/carrinho',[IndexBakeryController::class,'Cart'])->name('Cart');

        Route::get('/adicionar-carrinho/{id}',[IndexBakeryController::class,'add_cart'])->name('add_cart');

        Route::get('/deletar-do-carrinho/{id}',[IndexBakeryController::class,'delete_cart'])->name('delete_cart');

        Route::get('/salvar-no-carrinho/{id}/{qty}',[IndexBakeryController::class,'save_cart'])->name('save_cart');

        Route::get('/salvar-data/{id}',[IndexBakeryController::class,'save_date'])->name('save_date');




        Route::get('/pagamento',[IndexBakeryController::class,'pay_bill'])->name('pay_bill');

        //credit card route
        Route::match(['get', 'post'], '/pagar', [IndexAdminController::class, 'pay_card'])->name('pay_card');


        Route::post('/conta',[IndexBakeryController::class,'bill'])->name('bill');


        Route::get('/redirect', [SocialController::class,'redirect']);
        Route::get('/callback', [SocialController::class,'callback']);

        // log out
        Route::get('/log-out', [SocialController::class,'logOut'])->name('logOut');


         Route::post('/registro',[IndexBakeryController::class,'post_register'])->name('postregister');


         Route::post('/registro-de-login',[IndexBakeryController::class,'post_login'])->name('post-login');



        Route::get('/informacao-usuario', [IndexBakeryController::class,'information_user'])->name('information_user');
        Route::get('/pedido', [IndexBakeryController::class,'order'])->name('order');
        Route::get('/favorito-usario', [IndexBakeryController::class,'user_favorite'])->name('user_favorite');


        //comment-product-ajax
        Route::get('/comment/{product_id}',[IndexBakeryController::class,'comment_ajax'])->name('comment_ajax');
        Route::get('/comment/delete-comment/{id}',[IndexBakeryController::class,'delete_comment_ajax'])->name('delete_comment_ajax');

        //comment-product
        Route::get('/comment-product',[IndexBakeryController::class,'comment_product'])->name('comment_product');

        //comment-blog-ajax
        Route::get('/comment_blog/{blog_id}',[IndexBakeryController::class,'comment_blog'])->name('comment_blog');


        Route::post('/postagem-contato',[IndexBakeryController::class,'post_contact'])->name('post_contact');

         Route::get('/favoritos/{id}',[IndexBakeryController::class,'favorite'])->name('favorite');
    });


