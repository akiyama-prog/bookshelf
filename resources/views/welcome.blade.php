@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div id="image">
        <div class="jumbotron">
            <div class="text-center">
                <h1 class="mb-4">Meet new Books!</h1>
                <p>読んだ本を記録する。<br>新しい本に出会う。<br>シンプルな読書記録サービス「Bookshelf」</p>
            </div>
        </div>
        </div>
        <div class="col-sm-8 offset-sm-2">
            @if (count($book_records)>0)
                @include('book_records.book_records',['book_records' => $book_records])
              
            @endif
        </div>
    
    @else
    <div id="background">
       <div class="jumbotron">
           <div class="text-center">
               <h1 class="mb-4">Welcome to the Bookshelf</h1>
               {!! link_to_route('signup.get',"Let's get started!",[],['class'=>'btn btn-secondary']) !!}
            </div>
       </div>
     </div>
    @endif
@endsection