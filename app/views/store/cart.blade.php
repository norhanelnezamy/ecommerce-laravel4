@extends('layout.main')
@section('title')
    Cart
@stop
@section('tr2')
    <center><p style="font-size: 30px;font-family:bold;color: turquoise;margin: 3%;"> Products in your cart</p></center>
    <table style="margin-left: 21% ;width: auto;border: 1px solid #000000;">
        <tr>
            <td>
                <p style="font-family: bold italic;margin: 5%;">Product Image</p>
            </td>
            <td>
                <p style="font-family: bold italic;margin: 5%;">Product Name</p>
            </td>
            <td>
                <p style="font-family: bold italic;margin: 5%;">Product Price</p>
            </td>
            <td>
                <p style="font-family: bold italic;margin: 5%;">Product Quantity</p>
            </td>
        </tr>
        {{--{{$p=0}}--}}
        @foreach($products as $product)
            @foreach($product as $product_info)
                {{--{{$p += $product_info->price}}--}}
            <tr>
                <td>
                    {{HTML::image($product_info->photo,$product_info->name,array('style'=>'width:70px;height:60px;margin: 15px;margin: 5%;'))}}
                </td>
                <td>
                    <p style="font-family: bold italic;margin: 5%;"> {{$product_info->name}}</p>
                </td>
                <td>
                    <p style="font-family: bold italic;margin: 5%;"> ${{$product_info->price}}</p>
                </td>
                <td><span style="margin-left: 5%;color:green; ">Quantity: 1</span> <a href="/store/removeitem/{{$product_info->id}}"><img src="/images/remove.gif"></a></td>
            </tr>
            @endforeach
        @endforeach
    </table>
    {{--<p style="font-size: 18px;font-family:bold italic;margin-top: 2%;color:green;margin-left: 21%;float: left;"> To payment by card<br> send money to 456789123456789 <br>the totality is: {{$p}}</p>--}}
    {{--{{Form::open(array('url'=>'www.paypal.com'))}}--}}
    {{--{{Form::hidden('user_id',Auth::user()->id)}}<br>--}}
    {{--{{Form::submit('payment by your card',array('style'=>'margin:10px;float:right;margin-right:22%;','class'=>'btn btn-primary'))}}--}}
    {{--{{Form::close()}}--}}
@stop