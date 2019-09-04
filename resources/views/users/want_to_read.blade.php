@extends('layouts.app')

@section('content')
<div class="container-fluid">
<dev class="row">
    <div class="col-sm-8">
        @include('users.navtab',['user' => $user])
        @include('book_records.book_records',['book_records' => $book_records])
    </div>
    
    <aside class="col-sm-3 offset-sm-1">
        @include('users.profile',['user' => $user])
    </aside>
</dev>
</div>
@endsection