@extends('layout.main')
@section('title')
    categories
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
        <table style="height: auto;width: 92%;">
            <tr>
                <td class="border"><p style="font-size: 25px;font-family: sans-serif bold;margin-left: 280px;"> Admin
                        Panel Category</p></td>
            </tr>
            <tr>
                <td class="border">
                    <p style="font-size: 20px;font-family: sans-serif bold;margin: 2%;">Categories</p>
                    <ul style="margin-top: 3%;">
                        @foreach($categories as $category)
                        <li>
                            {{ Form::open(array('url'=>'admin/categories/destroy' , 'class'=> 'form-inline')) }}
                            {{ Form::label($category->name ,'',array('style'=>'width:150px;'))}}
                            {{ Form::hidden('id',$category->id) }}
                            {{ Form::submit('delete' ,array('class'=>'btn btn-danger','style'=>'height:30px; margin-left:30px;')) }}
                            {{ Form::close() }}
                        </li>
                        <br>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </table>
        <p style="font-size: 20px;font-family: sans-serif bold;margin: 2%;"> Create new category</p>

        <div>
            {{Form::open(array('url'=>'admin/categories/create' ))}}
            {{Form::text('name','',array('placeholder'=>'Category name','style'=>'margin-left:10px;'))}}<br>
            {{Form::submit('create',array('style'=>'margin:10px;','class'=>'btn btn-primary'))}}
            {{Form::close()}}
        </div>
    </div>
@stop
@section('tr3')

@stop