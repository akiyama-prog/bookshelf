@extends('layouts.app')

@section('content')
<div class="row">
<div class='col-sm-6 offset-sm-3'>
    <h1>Edit</h1>
        {!! Form::model($book_record,['route' => ['book_records.update',$book_record->id], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('title','Title*: タイトル',['class' => 'control-label']) !!}
            {!! Form::text('title',old('title'),['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('author','Author*: 作者',['class' => 'control-label']) !!}
            {!! Form::text('author',old('author'),['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('genre','Genre*: ジャンル',['class' => 'control-label']) !!}<br>
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
            {!! Form::label('content','Comment: 感想') !!}
            {!! Form::textarea('content',old('content'),['class'=>'form-control']) !!}
        </div>
        
         <div class="form-group">
            {!! Form::label('private_content','Private commemt: 非公開メモ') !!}
            {!! Form::textarea('private_content',old('private_content'),['class' => 'form-control']) !!}
        </div>
         {!! Form::submit('update!',['class'=>'btn btn-info btn-block mt-5']) !!}
         
    {!! Form::close() !!}
</div>
</div>
@endsection