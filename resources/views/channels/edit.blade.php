@extends('layouts.app')


@section('content')

<div class="container">

    @if( count($errors) > 0 )

    <ul class="list-group">

        @foreach( $errors->all() as $error )

            <li class="list-group-item">

                {{ $error }}
            
            </li>

        @endforeach

    </ul>

    @endif

    <form action=" {{ route('channels.update',['channel'=>$channel->id]) }} " method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">Channel Name</label>
            <input type="text" class="form-control" value="{{ $channel->title }}" name="name">    
        </div>
        <div class="form-group">
            <div class="text-center">

                <input type="submit" value="Update Channel" class="btn btn-success btn-lg">

            </div>
        </div>
    </form>

</div>

@endsection