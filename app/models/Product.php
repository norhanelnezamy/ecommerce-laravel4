<?php


class Product extends Eloquent{

    protected $fillable = array('product_name','description','price','photo','category_id');
    public static $rules = array(
        'product_name'=>'required|min:2',
        'description'=>'required|min:20',
        'price'=>'required|numeric',
        'photo'=>'required|mimes:jpeg,jpg,png,bmp,gif',
        'category_id'=>'required|integer'
    );

    public function category(){
        return $this->belongsTo('Category');
    }
}