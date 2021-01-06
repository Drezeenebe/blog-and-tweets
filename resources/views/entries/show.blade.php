@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{--Entry--}}
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{$entry->title}}</div>
                <div class="card-body">
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

            {{--Comentarios--}}
            <hr></hr>
            <div class="card">
                <div class="card-header">
                  Commentaries
                </div>
                <div class="card-body">
                    @foreach ($comentaries as $comentary)
                        <blockquote class="blockquote mb-0 mt-4">
                            <p>{{$comentary->content}}</p>
                            <footer class="blockquote-footer"><a href="{{url('@'.$comentary->user->username)}}"> {{$comentary->user->name}}</a> <b>Date: {{date("F j, Y, g:i a", strtotime($comentary->created_at))}}</b></footer>
                            <hr>
                        </blockquote>
                    @endforeach
                    <div class="row justify-content-center">{{$comentaries->links()}}
                    </div>
                </div>
            </div>

            {{--Formulario de nuevo comentario--}}
            <div class="card mt-4">
                <div class="card-header">New commentary</div>
                <div class="card-body">
                    <form action="{{route('commentary_store', $entry->id)}}" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label for="content" >Commentary</label>
                            <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content"
                            required autocomplete="content">{{old('content')}}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Send commentary</button>
                    </form>
                </div>
            </div>
            {{--Fin del comentario--}}
        </div>
    </div>
</div>
@endsection
