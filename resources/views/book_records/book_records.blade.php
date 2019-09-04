<ul class="list-unstyled">
    @foreach($book_records as $book_record)
<div class="container">
    <li class="mt-5">
        <table class="table table-bordered" style="table-layout:fixed;width:100%;">
            <colgroup>
                <col style="width:30%;">
                <col style="width:70%;">
            </colgroup>
        <thead>
            <tr>
                <th>Title</th>
                <th class="text-center">{{ $book_record->title }}</th>
            </tr>
         </thead>
         
         <tbody>
            <tr>
                <th>Author</th>
                <td class="text-center">{{ $book_record->author }}</td>
            </tr>
            <tr>
                <th>Genre</th>
                <td class="text-center">{{ $book_record->genre }}</td>
            </tr>
            @if($book_record->content)
            <tr>
                <th>Comment</th>
                <td class="text-center" style="word-wrap:break-word;">{{ $book_record->content }}</td>
            </tr>
            @endif
            
            @if(Auth::user()->id == $book_record->user_id && $book_record->private_content)
            <tr>
                <th>Private memo</th>
                <td class="text-center" style="word-wrap:break-word;">{{ $book_record->private_content }}</td>
            </tr>
            @endif
            <tr>
                <th>posted at</th>
                <td class="text-center">{{ $book_record->created_at }}</td>
            </tr>
         </tbody>
        @if(Auth::user()->id != $book_record->user_id) 
         <tfoot align="right">
             <td colspan="2">
                 <p class="ml-3">posted by <span>{!! link_to_route('users.show', $book_record->user->name,['id' => $book_record->user->id],['class'=>'text-info']) !!}</span></p>
             </td>
         </tfoot>
        @endif
        </table> 
    </li>
</div>
    
    <div class="text-center">
        @if(Auth::id() == $book_record->user_id)
            <div class="btn-group" role="group">
            {!! Form::open(['route' => ['book_records.destroy',$book_record->id],'method'=>'delete']) !!}
                {!! Form::submit('Delete',['class' => 'btn btn-outline-secondary']) !!}
            {!! Form::close() !!}
            <div class="edit_button">
            {!! link_to_route('book_records.edit','Edit',['id' => $book_record],['class'=>'btn btn-outline-info']) !!}
            </div>
        @else 
           
            @include('book_list.add_button',['book_record' => $book_record])
           
        @endif
    </div>
    @endforeach
</ul>
<div class='d-flex justify-content-center'>{{ $book_records->links('pagination::bootstrap-4') }}</div>
