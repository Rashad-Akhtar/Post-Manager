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

    <form action=" {{ route('channels.store') }} " method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Channel Name</label>
            <input type="text" class="form-control" name="name">    
        </div>
        <div class="form-group">
            <div class="text-center">

                <input type="submit" value="Create Channel" class="btn btn-success btn-lg">

            </div>
        </div>
    </form>

</div>

@endsection