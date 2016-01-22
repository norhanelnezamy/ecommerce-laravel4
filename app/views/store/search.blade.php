@extends('layout.main')
@section('title')
    Search
@stop
@section('tr2')
    <center><p style="font-size: 30px;font-family:bold;color: turquoise;margin: 3%;">Result search of {{$keyword}}</p></center>
    @foreach($products as $product)
        <div style="height: 300px;margin:3%;margin-left: 5%;">
            <div style="float: left;margin-right: 30px;">
                <a href="/store/view/{{$product->id}}">
                    {{HTML::image($product->photo,$product->name,array('style'=>'width:300px;height:220px;margin: 15px;'))}}
                </a>
            </div>
            <div style="float: left; margin: 35px;">
                <label style="margin: 4%;font-family: bold italic;font-size: 20px;">
                    <a href="/store/view/{{$product->id}}"
                       style="text-decoration: none;font-family: bold italic;"> {{$product->name}}</a>
                </label>

                <p style="width: 200px;margin-left: 8px;">{{$product->description}}</p>
                <h5 style="margin-left: 8px;">Availability:
                    @if($product->available == 0)
                        <span style="color: red;">out of stock</span>
                    @endif
                    @if($product->available == 1)
                        <span style="color: green;">  in stock</span>
                    @endif
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
    @endforeach
@stop