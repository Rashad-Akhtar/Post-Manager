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
              <h3 class="text-center text-info"> Update Discussion </h3>
        </div>

        <div class="card-body">

                <form action=" {{ route('discussion.update',['id'=>$discussion->id]) }} " method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="discuss_content" class="text-info">Update Content</label> 
                            <textarea name="discuss_content"  cols="5" rows="5" class="form-control">
                                {{ $discussion->content }}
                            </textarea>

                        </div>
                        <div class="form-group">
                            <div class="text-center">
                
                                <input type="submit" value="Update Discussion" class="btn btn-success btn-lg">
                
                            </div>
                        </div>
                    </form>

        </div>

    </div>

</div>

@endsection