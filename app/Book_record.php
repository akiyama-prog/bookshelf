<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_record extends Model
{
    protected $fillable = ['title','author','genre','content','user_id','private_content'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function list_holders(){
        return $this->belongsToMany(User::class,'want_to_read','book_id','user_id')->withTimestamps();
    }
}
