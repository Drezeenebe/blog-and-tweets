@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$entry->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$entry->content}}
                    @can ('update',$entry)
                        <hr>
                    <a href="{{ url('/entries/'.$entry->id.'/edit')}}"
                        class="btn btn-primary">
                        Edit entry
                    </a>
                    @endcan
                </div>

                <div class="card-footer">
                    Author: <a href="{{url('@'.$entry->user->username)}}"> {{$entry->user->name}}</a>
                </div>
            </div>

            <hr></hr>
            <div class="card">
                <div class="card-header">
                  Comentarios
                </div>
                <div class="card-body">
                    @foreach ($comentaries as $comentary)
                        <blockquote class="blockquote mb-0 mt-4">
                            <p>{{$comentary->content}}</p>
                            <footer class="blockquote-footer">{{$comentary->user->name}} <b>Date: {{date("F j, Y, g:i a", strtotime($comentary->created_at))}}</b></footer>
                            <hr>
                        </blockquote>
                    @endforeach
                    <div class="row justify-content-center">{{$comentaries->links()}}
                    </div>
                </div>
              </div>

        </div>
    </div>
</div>
@endsection
