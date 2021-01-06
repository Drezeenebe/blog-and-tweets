<?php

namespace App\Http\Controllers;

use App\Comentary;
use Illuminate\Http\Request;

class ComentaryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:3000'
        ]);

        $comentary = new Comentary();
        $comentary->title=$validatedData['title'];
        $comentary->user_id=auth()->id();
        $comentary->entry_id=$request->get('entry_id');
        $comentary->save();

        $status = 'Your entry has been published successfully.';
        return back()->with(compact('status'));
    }
}
