@extends('layout.main')
@section('title')
    Sign in
@stop
@section('tr2')
    <div style=" margin-left:4%;height: auto;">
        <p style="font-size: 25px;font-family: sans-serif bold;margin: 1%;margin-top: 10%;margin-bottom: 2%;"> Sign in to your account</p>

        {{Form::open(array('url'=>'/users/signin'))}}
        {{Form::text('email','',array('placeholder'=>'   Write your E-mail','style'=>'margin-left:5px;'))}}<br>
        {{Form::password('password',array('placeholder'=>'   Write your password','style'=>'margin:5px;'))}}<br>
        {{Form::submit('signin',array('style'=>'margin:10px;margin-bottom: 4%;','class'=>'btn btn-primary'))}}
        {{Form::close()}}
    </div>
@stop