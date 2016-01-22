@extends('layout.main')
@section('title')
    Register
@stop
@section('tr2')
    <div style=" margin-left:4%;margin-top:2%">
        <p style="font-size: 25px;font-family: sans-serif bold;margin: 1%;margin-top: 4%;margin-bottom: 4%;"> Register new account</p>
            {{Form::open(array('url'=>'/users/create'))}}
            {{Form::text('first_name','',array('placeholder'=>'   Write your first name','style'=>'margin:5px;'))}}<br>
            {{Form::text('last_name','',array('placeholder'=>'   Write your last name','style'=>'margin:5px;'))}}<br>
            {{Form::text('telephone','',array('placeholder'=>'   Write your telephone','style'=>'margin:5px;'))}}<br>
            {{Form::text('email','',array('placeholder'=>'   Write your E-mail','style'=>'margin:5px;'))}}<br>
            {{Form::password('password',array('placeholder'=>'   Write your password','style'=>'margin:5px;'))}}<br>
            {{Form::password('password_confirmation',array('placeholder'=>'  confirm your password','style'=>'margin:5px;'))}}<br>
            {{Form::submit('create',array('style'=>'margin:10px;margin-bottom: 4%;','class'=>'btn btn-info'))}}
            {{Form::close()}}
    </div>
@stop