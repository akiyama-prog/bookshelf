<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        
        return view('users.index',[
            'users' => $users,
            ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $book_records = $user->book_records()->orderBy('created_at','desc')->paginate(5);
        
        $data = [
            'user' => $user,
            'book_records' => $book_records,
        ];
        $data += $this->counts($user);
        return view('users.show',$data);
            
    }
    
    public function edit($id)
    {  
        $user = User::find($id);
        
        return view('users.edit',[
            'user'=>$user,
            ]);
    }
    
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'favorite_genres' => 'required|string|max:191',
            'favorite_author' => 'required|string|max:191',
            ]);
            
        $user=User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->favorite_genres = $request->favorite_genres;
        $user->favorite_author = $request->favorite_author;
        $user->save();
        
        return redirect('/');
    }
}
