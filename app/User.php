<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','favorite_genres','favorite_author', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function book_records(){
        return $this->hasMany(Book_record::class);
    }
    
    public function book_lists(){
        return $this->belongsToMany(Book_record::class,'want_to_read','user_id','book_id')->withTimestamps();
    }
    
    public function add_book_list($bookId)
    {
        $exist = $this->is_adding_list($bookId);
        
        if($exist){
            return false;
        }else{
            $this->book_lists()->attach($bookId);
            return true;
        }
    }
    
    public function remove_book_list($bookId)
    {
        $exist = $this->is_adding_list($bookId);
        
        if($exist){
            $this->book_lists()->detach($bookId);
            return true;
        }else{
            return false; 
        }
    }
    
    public function is_adding_list($bookId)
    {
        return $this->book_lists()->where('book_id',$bookId)->exists();
    }
}
