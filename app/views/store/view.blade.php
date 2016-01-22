@extends('layout.main')
@section('title')
    View
@stop
@section('tr2')
    <div style="height: 460px;">
        <div style=" margin-left:4%;margin-top:10% ;float: left;">
            {{HTML::image($product->photo,$product->name,array('style'=>'width:400px;height:340px;margin: 15px;'))}}
        </div>
        <div style=" margin-left:7%;margin-top:15% ;float: left;">
            <label style="margin: 4%;font-family: bold italic;font-size: 20px;">{{$product->name}}</label>

            <p style="width: 200px;margin-left: 8px;">{{$product->description}}</p>
            <h5 style="margin-left: 8px;">Availability:<span style="color:#265A88; ">
               @if($product->available == 0)
                        <span style="color: red;">out of stock</span>
                    @endif
                    @if($product->available == 1)
                        <span style="color: green;">  in stock</span>
                    @endif
                            </span>
            </h5>

            <p style="font-family: bold italic;margin: 10px;">Product code: <span
                        style="color:#265A88;">{{$product->id}}</span></p>
            <a href="/store/addtocart/{{$product->id}}" style="text-decoration: none;margin-left: 8px;">
                <span style="color:#265A88;">${{$product->price}}</span>
                {{HTML::image('images/blue-cart.gif','Add to cart')}}
                Add to cart
            </a>
        </div>
    </div>
@stop