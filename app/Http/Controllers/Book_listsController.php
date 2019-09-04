<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Book_listsController extends Controller
{
    public function store(Request $request,$bookId){
        \Auth::user()->add_book_list($bookId);
        return back();
        
    }
    
    public function destroy($bookId){
        \Auth::user()->remove_book_list($bookId);
        return back();
    }
}
