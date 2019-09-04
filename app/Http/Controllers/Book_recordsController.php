<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book_record;
use App\User;

class Book_recordsController extends Controller
{
    public function users_index(){
        $data = [];
        if(\Auth::check()){
            $book_records=Book_record::orderBy('created_at','desc')->paginate(5);
            $user=\Auth::user();
            
            $data =[
               'book_records' => $book_records,
               'user' => $user,
               ];
        }
        return view('welcome',$data);
        
    }
    
    public function index(){
        $user = \Auth::user();
        $book_records = $user->book_records->orderBy('created_at','desc')->paginate(5);
        
        $data = [
            'user'=>$user,
            'book_records'=>$book_records,
            ];
    }
    
    public function create()
    {
        $book_record = new Book_record;
        $user=\Auth::user();
        
        $genres = ["ミステリー・サスペンス","SF・ファンタジー","恋愛"];
        $genres2=["ノンフィクション","詩歌","自伝・伝記","その他"];

        $data = [
            'book_record' => $book_record,
            'user' => $user,
            'genres' => $genres,
            'genres2' => $genres2
            ];
            $data += $this->counts($user);
        return view('book_records.create',$data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:30',
            'author' => 'required|max:30',
            'genre' => 'required',
            'content' => 'max:191',
            'private_content' => 'max:191',
            
        ]);
        
        $content = $request->content;
        if($content === null){
            $content="";
        }
        $private_content = $request->private_content;
        if($private_content === null){
            $private_content="";
        }
        
        $request->user()->book_records()->create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'content' => $content,
            'private_content' => $private_content,
        ]);
        return back();
    }
    
    public function edit($id)
    {
     $book_record = Book_record::find($id);
     $genres = ["ミステリー・サスペンス","SF・ファンタジー","恋愛"];
     $genres2 = ["ノンフィクション","詩歌","自伝・伝記","その他"];
     
     return view('book_records.edit',[
         'book_record'=> $book_record,
         'genres' => $genres,
         'genres2' => $genres2
         ]);
    }
    
    public function update(Request $request,$id)
    {
        
        $book_record = Book_record::find($id);
        
        $this->validate($request,[
            'title' => 'required|max:30',
            'author' => 'required|max:30',
            'genre' => 'required',
            'content' => 'max:191',
            'private_content' => 'max:191',
            
        ]);
        
        $content = $request->content;
        if($content === null){
            $content="";
        }
        $private_content = $request->private_content;
        if($private_content === null){
            $private_content="";
        }
        
        $book_record = Book_record::find($id);
            
            
            $book_record->title = $request->title;
            $book_record->author = $request->author;
            $book_record->genre = $request->genre;
            $book_record->content = $content;
            $book_record->private_content = $private_content;
            $book_record->save();

            return redirect('/');        
    }
    public function destroy($id)
    {
        $book_record = \App\Book_record::find($id);
        
        if(\Auth::id() === $book_record->user_id){
            $book_record->delete();
        }
        return back();
    }
    
    public function book_lists($id)
    {
        $user = User::find($id);
        $book_lists = $user->book_lists()->paginate(5);
        
        $data = [
            'user'=>$user,
            'book_records' => $book_lists,
            ];
            
            $data += $this->counts($user);
            
            return view('users.want_to_read',$data);
    }
}
