@extends('layout.main')
@section('title')
    Home
@stop
@section('tr2')
    <a href="/"> {{HTML::image('images/ecommerce.jpg','shoping',array('style'=>'width:100%;height:280px'))}}</a>
    <center><p style="font-size: 30px;font-family:bold;color: #265A88;margin-bottom: 3%;"> New Products</p></center>
    <div style=" margin-left:4%;margin-top:2%">
        <table style="height: auto;width: 92%;margin-bottom: 5%;border-top: 1px solid #868686;">
            <tr>
                @foreach($products as $product)
                    <td>
                        <a href="/store/view/{{$product->id}}">
                            {{HTML::image($product->photo,$product->name,array('style'=>'width:230px;height:135px;margin: 15px;'))}}
                        </a>
                        <label style="margin: 4%;">
                            <a href="/store/view/{{$product->id}}" style="text-decoration: none;font-family: bold italic;" > {{$product->name}}</a>
                        </label>
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
                        <a href="/store/addtocart/{{$product->id}}" style="text-decoration: none;margin-left: 8px;">
                            <span style="color:#265A88;">${{$product->price}}</span>
                            {{HTML::image('images/blue-cart.gif','Add to cart')}}
                            Add to cart
                        </a>
                    </td>
                @endforeach
            </tr>
        </table>
    </div>
@stop
