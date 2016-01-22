<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @section('head')
        <link rel="stylesheet" type="text/css" href="{{URL::asset('bootstrap_style/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{URL::asset('bootstrap_style/css/bootstrap-theme.min.css')}}"/>
        <script src="{{URL::asset('bootstrap_style/js/jquery.js')}}"></script>
        <script src="{{URL::asset('bootstrap_style/js/bootstrap.min.js')}}"></script>
    @show
</head>
<style>
    a {
        margin-top: 30px;
        color: #265A88;
        cursor: pointer;
    }

    a:hover {
        color: #878883;
    }

    td {
        border: 1px solid;
        border-top: 0px;
        border-bottom-color: #868686;
    }
</style>
<body>
<table style="width: 70%;height: auto; margin-left:15%;">
    <tr>
        <td>
            <div style="height:35px; padding:3px;" class="well">
                <p style="font-size:15px;">phone order: 01282082920 | Email us:<span
                            style="color:#265A88 ;"> norhanelnezamy@gmail.com</span></p>
            </div>
            <div>
                <a href="/"> {{HTML::image('images/eComm.png','shop by category',array('style'=>'margin-left:25;width:150px;height:55px'))}}</a>

                <div style="float :right; border-left:2px gray dotted;margin: 15px; margin-right: 45px;">
                    <a href="/store/cart" style="text-decoration: none; margin: 8px;">view cart</a>
                    {{HTML::image('images/blue-cart.gif','user')}}
                </div>
                <div class="dropdown" style="float :right; margin-top: 15px;">
                    <div style="border-left:2px gray dotted;">
                        @if(Auth::check())
                            <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false"
                               style="margin-left: 12px;text-decoration: none;">
                                {{Auth::user()->first_name;}}{{HTML::image('images/user-icon.gif','user')}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                @if(Auth::user()->admin ==1)
                                    <a href="/admin/categories" style="text-decoration: none; margin-left: 20px;">manage
                                        categories</a><br>
                                    <a href="/admin/products" style="text-decoration: none; margin-left: 20px;">mange
                                        products</a><br>
                                @endif
                                <a href="/users/signout"
                                   style="text-decoration: none; margin-left: 20px;">logout</a><br>
                                    <a href="#" style="text-decoration: none; margin-left: 20px;">about us</a><br>
                                    <a href="#" style="text-decoration: none; margin-left: 20px;">contact us</a>
                            </ul>
                        @else
                            <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false"
                               style="margin-left: 12px;text-decoration: none;">
                                user{{HTML::image('images/user-icon.gif','user')}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <a href="/users/signin" style="text-decoration: none; margin-left: 20px;">sign
                                    in</a><br>
                                <a href="/users/register" style="text-decoration: none; margin-left: 20px;">register</a><br>
                                <a href="#" style="text-decoration: none; margin-left: 20px;">about us</a><br>
                            </ul>
                        @endif
                    </div>
                </div>
                <div style="border-left:2px gray dotted; float: right; margin-top: 12px;height: 27px;">
                    {{Form::open(array('url'=>'/store/search' , 'method'=> 'get'))}}
                    {{Form::text('keyword','',array('placeholder'=>'search by word','style'=>'margin-left:10px'))}}
                    {{Form::submit('search',array('style'=>'margin-right:10px;height:30px','class'=>'btn btn-info'))}}
                    {{Form::close()}}
                </div>
                <div class="dropdown" style="float :right; margin-top: 15px; margin-right: 10px;">
                    <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                       style="margin-left: 12px;color: #265A88;text-decoration: none;">
                        search by category
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        @foreach($catenav as $cate)
                            <li>
                                {{HtML::link('/store/category/'.$cate->id,$cate->name,array('style'=>'text-decoration: none;'))}}
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </td>
    </tr>
    <tr>
        <td>
            @yield('tr2')
            @if(Session::has('message'))
                <div style="width:700px;height:50px;margin-left: 11%;margin-top:4%" class="well">
                    <center>
                        <p style="font-family: sans-serif bold ;color: #265A88">{{Session::get('message')}}</p>
                    </center>
                </div>
            @endif
            @if($errors->has())
                <div style="width:700px;height:auto;margin-left: 11%;" class="well">
                    <p style="font-family: sans-serif bold;color: #265A88;margin: 10px;">Follwing error has accourd</p>
                    <ul style="color: red;">
                        @foreach($errors->all() as $error)
                            <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            <div style="margin-right: 8%; margin-top: 30px;float: right;">
                {{HTML::image('images/visaCard.jpg','support VISA card',array('style'=>'width:70px;height:30px'))}}
                {{HTML::image('images/MasterCard.jpg','support MASTER card',array('style'=>'width:70px;height:40px'))}}
                {{HTML::image('images/cirrus.jpg','support MASTER card',array('style'=>'width:70px;height:40px'))}}
                {{HTML::image('images/plus.jpeg','support MASTER card',array('style'=>'width:70px;height:40px'))}}
                {{HTML::image('images/paypal.jpeg','support MASTER card',array('style'=>'width:70px;height:40px'))}}
            </div>
            <div style="margin-right: 35%;font-size: 15px; margin-top: 1%;margin-bottom: 30px; float: right">
                For phone order please call 01282082920 <br>
                Also you can call us at <span style="color:#265A88">norhanelnezamy@gmail.com</span>
            </div>
        </td>
    </tr>
</table>
</body>
</html>