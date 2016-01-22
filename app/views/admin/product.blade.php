@extends('layout.main')
@section('title')
    Products
@stop
<style>
    .border {
        border-left: none;
        border-right: none;
        border-bottom: 1px solid #868686;
    }
</style>
@section('tr2')
    <div style=" margin-left:4%;margin-top:2%">
        <table style="height: auto;width: 100%;">
            <tr>
                <td class="border"><p style="font-size: 25px;font-family: sans-serif bold;margin-left: 280px;"> Admin Panel Products</p></td>
            </tr>
            <tr>
                <td class="border" width="100%">
                    <p style="font-size: 20px;font-family: sans-serif bold;margin: 2%;">Products description</p>

                    <ul style="margin: 3%;">
                        @foreach($products as $product)
                            <li>
                                {{ Form::open(array('url'=>'admin/products/action' , 'class'=> 'form-inline form-group','method'=>'POST'))}}
                                {{ Form::label($product->name ,'',array('style'=>'width:100px;'))}}
                                {{ HTML::image($product->photo,$product->description,array('style'=>'margin-left:25;width:80px;height:55px'))}}
                                {{ Form::hidden('id',$product->id) }}
                                {{ Form::submit('delete', array('class' => 'btn btn-danger', 'name'=>'delete','style'=>'height:30px; margin-left:30px; margin-right:40px; ')) }}

                                {{ Form::select('available',array('1'=>'in stock', '0'=>'out of stock'),$product->available)}}
                                {{ Form::submit('update' ,array('class'=>'btn btn-primary', 'name'=>'update','style'=>'height:30px; margin-left:30px;')) }}
                                {{ Form::close() }}

                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </table>
        <p style="font-size: 25px;font-family: sans-serif bold;margin: 1%;margin-top: 4%;margin-bottom: 4%;: "> Add new product</p>
        {{Form::open(array('url'=>'admin/products/add' , 'files'=> true))}}
        {{Form::label('Name','',array('style'=>'margin:5px;'))}}<br>
        {{Form::text('product_name','',array('placeholder'=>'   Enter product name','style'=>'margin:5px;'))}}<br>
        {{Form::label('Price','',array('style'=>'margin:5px;'))}}<br>
        {{Form::text('price','',array('placeholder'=>'   Enter product price','style'=>'margin:5px;'))}}<br>
        {{Form::label('Product photo','',array('style'=>'margin:5px;'))}}<br>
        {{Form::file('photo')}}<br>
        {{Form::label('Description','',array('style'=>'margin:5px;'))}}<br>
        {{Form::textarea('description','',array('placeholder'=>'   Descripe new product','style'=>'margin:5px;max-height:150px;'))}}
        <br>
        {{Form::label('Select the suitable category','',array('style'=>'margin:5px;margin-bottom:8px;'))}}<br>
        {{Form::select('category_id',$categories)}}<br>
        {{Form::submit('Add new product',array('style'=>'margin-top:10px;margin-bottom: 4%;','class'=>'btn btn-primary'))}}
        {{Form::close()}}
    </div>
@stop
@section('tr3')
@stop