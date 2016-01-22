<?php


class CategoriesController extends BaseController
{

    public function __construct(){
        parent::__construct();
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('admin');
    }

    public function getIndex()
    {
        return View::make('admin/category')
            ->with('categories', Category::all());
    }

    public function postCreate()
    {
        $validate = Validator::make(Input::all(), Category::$rules);

        if ($validate->passes()) {
            $category = new Category();
            $category->name = Input::get('name');
            $category->save();

            return Redirect::to('admin/categories')
                ->with('message', 'Category has been created');

        }

        return Redirect::to('admin/categories')
            ->with('message', 'Something went wrong')
            ->withErrors($validate)
            ->withInput();
    }

    public function postDestroy(){
        $category = Category::find(Input::get('id'));
        if($category){
            $category->delete();
            return Redirect::to('admin/categories')
                ->with('message', 'Category has been deleted');
        }

        return Redirect::to('admin/categories')
            ->with('message', 'Something went wrong please try again');
    }
}