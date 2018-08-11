@extends('layouts.app')

@section('content')

           @foreach($discussions as $d)

           <div class="card">

            <div class="card-heading pt-2">

               <img src="{{ asset('avatars/graduate.png') }}" class="ml-2" alt="avatar" width="50" height="50">
                <span class="text-primary font-weight-bold ml-2">{{ $d->user->name }} , {{ $d->created_at->diffForHumans() }} </span>


                @if($d->hasBestAnswer())
                <span class="float-right text-white bg-danger p-2 mr-2">Closed</span>
                @else
                <span class="float-right text-white bg-success p-2 mr-2">Open</span>
                @endif


                <span class="float-right mr-2"><a href=" {{ route('discussion',['slug'=>$d->slug]) }} " class="btn btn-info ">View</a></span>
               <hr>

            </div>

            <div class="card-body">

                <h4 class="text-center font-weight-bold"> {{ $d->title }} </h4>

               <p class="text-center">
                {{ str_limit($d->content , 70) }}
               </p>
 
            </div>

            <div class="card-footer">

                @if( $d->replies->count() > 1 )

                 {{ $d->replies->count() }} Replies
                 
                @else
                
                {{ $d->replies->count() }} Reply
                
                @endif
                <a href="{{ route('channel.slug',['slug'=>$d->channel->slug]) }}" class="btn btn-default btn-sm float-right">{{ $d->channel->title }}</a>
            </div>

           </div>
           <br>

           @endforeach

           
           
          <br>
           <div>
                <div class="text-center" style="margin-left:300px">

                        {{ $discussions->links() }}
        
                </div>
           </div>
    
@endsection