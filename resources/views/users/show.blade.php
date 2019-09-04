@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
        @include('users.navtab', ['user' => $user])

        @if(count($book_records)>0)
            @include('book_records.book_records', ['book_records' => $book_records])
        @endif
        </div>
        <aside class="col-sm-3 offset-sm-1">
             @include('users.profile',['user' => $user])
        </aside>
    </div>
</div>   
@endsection