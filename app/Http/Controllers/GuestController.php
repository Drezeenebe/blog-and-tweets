<?php

namespace App\Http\Controllers;

use App\Comentary;
use App\Entry;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        //dd('GuestController');
        $entries = Entry::with('user')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(10);
        return view('welcome', compact('entries'));
    }

    public function show (Entry $entry){
        $entries = Entry::with('user')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(10);
        $comentaries = Comentary::where('entry_id',$entry->id)->paginate(2);
        return view('entries.show',compact('entry','comentaries'));
    }
}
