<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
     public function counts($user){
        $count_book_records = $user->book_records()->count();
        $count_book_lists = $user->book_lists()->count();
        
        return[
            'count_book_records' => $count_book_records,
            'count_book_lists' => $count_book_lists,
            ];
    }
}
