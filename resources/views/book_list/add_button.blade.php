<div class="d-flex justify-content-center">
    @if(Auth::user()->is_adding_list($book_record->id))
        {!! Form::open(['route' => ['book_list.remove',$book_record->id],'method' => 'delete']) !!}
            {!! Form::submit('remove',['class'=>'btn btn-outline-secondary']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['book_list.add', $book_record->id]]) !!}
            {!! Form::submit('add this book' ,['class' => 'btn btn-outline-info']) !!}
        {!! Form::close() !!}
    @endif
     
</div>