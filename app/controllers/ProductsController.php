<?php


class ProductsController extends BaseController
{

    public function __construct(){
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('admin');
    }

    public function getIndex()
    {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        return View::make('admin/product')
            ->with('products', Product::all())
            ->with('categories', $categories);
    }

    public function postAdd()
    {
        $validate = Validator::make(Input::all(), Product::$rules);

        if ($validate->passes()) {
            $product = new Product();
            $product->name = Input::get('product_name');
            $product->price = Input::get('price');
            $product->description = Input::get('description');
            $product->category_id = Input::get('category_id');

            $photo = Input::file('photo');
            $fileName = date('Y-m-d-H:i:s') . "-" . $photo->getClientOriginalName();
            $path = public_path('images/products/' . $fileName);
            Image::make($photo->getRealPath())->save($path);
            $product->photo = 'images/products/' . $fileName;

            $product->save();

            return Redirect::to('admin/products')
                ->with('message', 'Product has been added');

        }

        return Redirect::to('admin/products')
            ->with('message', 'Something went wrong')
            ->withErrors($validate)
            ->withInput();
    }


    public function postAction() {

        $product = Product::find(Input::get('id'));
        if ($product) {
            if (Input::get('delete')) {
                File::delete('public/' . $product->photo);
                $product->delete();
                return Redirect::to('admin/products')
                    ->with('message', 'Product has been deleted');
            }

            if (Input::get('update')) {
                $product->available = Input::get('available');
                $product->save();
                return Redirect::to('admin/products')
                    ->with('message', 'Product update');
            }

            return Redirect::to('admin/products')
                ->with('message', 'Something went wrong please try again');
        }
    }

}