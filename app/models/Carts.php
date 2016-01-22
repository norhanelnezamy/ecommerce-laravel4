<?php


class Carts extends Eloquent{

    protected $fillable = array('user_id','product_id');
    public static $rules = array(
        'user_id'=>'required|integer',
        'product_id'=>'required|integer'
    );

    public function user(){
        return $this->belongsToMany('User');
    }
}