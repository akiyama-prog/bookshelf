@extends('layouts.app')

 
@section('content')

    <div class="text-center">
        <h1>Sign up</h1>
    </div>
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name','Name*') !!}
                    {!! Form::text('name',old('name'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'Email*') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('favorite_genres','Favorite genres: 好きなジャンル') !!}
                    {!! Form::text('favorite_genres',old('favorite_genres'),['class' => 'form-control']) !!}
                 </div>

                <div class="form-group">
                    {!! Form::label('favorite_author','Favorite author: 好きな作家') !!}
                    {!! Form::text('favorite_author',old('favorite_author'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-gropu">
                    {!! Form::label('password','Password*') !!}
                    {!! Form::password('password',['class' => 'form-control','placeholder'=>'more than 6 letters']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation','Confirmation*: 確認') !!}
                    {!! Form::password('password_confirmation',['class' =>'form-control','placeholder'=>'more than 6 letters']) !!}
                </div>
                {!! Form::submit('Sign up', ['class' => 'btn btn-secondary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection