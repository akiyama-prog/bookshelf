@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-sm-8">
        @include('users.navtab')
    {!! Form::model($book_record,['route' => 'book_records.store']) !!}
        <div class="form-group">
            {!! Form::label('title','Title*',['class' => 'control-label']) !!}
            {!! Form::text('title',old('title'),['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('author','Author*',['class' => 'control-label']) !!}
            {!! Form::text('author',old('author'),['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('genre','Genre*',['class' => 'control-label']) !!}<br>
                <div class="row">
                    @foreach($genres as $genre)
                <div class="col-sm-6">
                {!! Form::radio('genre',$genre) !!}
                    {{ $genre }}
                </div>
                @endforeach
                @foreach($genres2 as $genre2)
                <div class="col-sm-6">
                {!! Form::radio('genre',$genre2) !!}
                    {{ $genre2 }}
                </div>
                @endforeach
                </div>
         </div>
        
        <div class="form-group">
            {!! Form::label('content','Comment') !!}
            {!! Form::textarea('content',old('content'),['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('private_content','Private memo') !!}
            {!! Form::textarea('private_content',old('private_content'),['class' => 'form-control']) !!}
        </div>
         {!! Form::submit('add to my bookshelf',['class'=>'btn btn-outline-info btn-block mt-4']) !!}
         
    {!! Form::close() !!}
    </div>
    <aside class="col-sm-3 offset-sm-1">
         @include('users.profile',['user' => $user])
    </aside>
</div>
</div>
@endsection