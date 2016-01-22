<?php

class StoreController extends BaseController
{

    public function  __constructor()
    {
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function getIndex()
    {
        return View::make('store.index')
            ->with('products', Product::take(3)->orderBy('created_at', 'DESC')->get());
    }

    public function getView($id)
    {
        return View::make('store.view')
            ->with('product', Product::find($id));
    }

    public function getSearch()
    {
        $keyword = Input::get('keyword');
        return View::make('store.search')
            ->with('products', Product::where('name', 'LIKE', '%' . $keyword . '%')->get())
            ->with('keyword', htmlspecialchars($keyword));
    }

    public function getCategory($cate_id)
    {
        return View::make('store.category')
            ->with('products', Product::where('category_id', '=', $cate_id)->paginate(5))
            ->with('category', Category::find($cate_id));
    }

    public function getAddtocart($id)
    {
        DB::table('carts')->insert(
            array('product_id' => $id, 'user_id' => Auth::user()->id)
        );
        return Redirect::back()
            ->with('message', 'product has added to your cart !');
    }

    public function getCart()
    {
        $cart_data = Carts::where('user_id', '=', Auth::user()->id)->get();
        $product = array();
        $i=0;
        foreach ($cart_data as $row)
            $product =array_add($product,$i++,Product::where('id', '=', $row ->product_id)->get()) ;

        return View::make('store.cart')
            ->with('products', $product);
    }
    public function getRemoveitem($id)
    {
        DB::table('carts')->where(array('product_id' => $id, 'user_id' => Auth::user()->id))->delete();
        return Redirect::to('store/cart')
            ->with('message', 'product has deleted from your cart !');
    }
}