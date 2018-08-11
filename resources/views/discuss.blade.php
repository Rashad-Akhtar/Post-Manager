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
    
    
    <div class="card">

        <div class="card-heading">
              <h3 class="text-center text-info"> Create a New Discussion </h3>
        </div>

        <div class="card-body">

                <form action=" {{ route('discuss.store') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="text-info">Discussion Name</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name" class="text-info">Pick a Chaneel</label>
                            <select name="channel_id" class="form-control">
                                  @foreach($channels as $channel)
                                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                  @endforeach
                            </select>
                                
                        </div>
                        <div class="form-group">
                            <label for="discuss_content" class="text-info">Put Content</label> 
                            <textarea name="discuss_content"  cols="5" rows="5" class="form-control">

                            </textarea>

                        </div>
                        <div class="form-group">
                            <div class="text-center">
                
                                <input type="submit" value="Create Discussion" class="btn btn-success btn-lg">
                
                            </div>
                        </div>
                    </form>

        </div>

    </div>

</div>

@endsection