<?php

namespace App\Http\Controllers;

use App\Comentary;
use App\Entry;
use Illuminate\Http\Request;

class ComentaryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function commentary_store(Request $request, Entry $entry){

        $validatedData = $request->validate([
            'content' => 'required|min:2|max:3000'
        ]);

        $comentary = new Comentary();
        $comentary->content=$validatedData['content'];
        $comentary->user_id=auth()->id();
        $comentary->entry_id=$entry->id;
        $comentary->save();

        $status = 'Your commentary has been published successfully.';

        return back()->with(compact('status'));
    }
}
