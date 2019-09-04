@extends('layouts.app')

@section('content')
<div class="text-center">
<h1>Edit Profile</h1>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::model($user,['route' => ['users.update',$user->id],'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',old('name'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('favorite_genres','Favorite genres') !!}
                    {!! Form::text('favorite_genres',old('favorite_genres'),['class' => 'form-control']) !!}
                 </div>

                <div class="form-group">
                    {!! Form::label('favorite_author','Favorite author') !!}
                    {!! Form::text('favorite_author',old('favorite_author'),['class' => 'form-control']) !!}
                </div>
                
                
                {!! Form::submit('up date', ['class' => 'btn btn-info btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection
    
