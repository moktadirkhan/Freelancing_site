@extends('layouts.app')

@section('content')



                <div class="col-md-10">


                <div class="d-flex justify-content-end mb-2">
                  <a class="btn btn-primary"  href="{{route('posts.create')}}" role="button">Create Project</a>
                   @if(Auth::user()->role_id==1)
                  <a class="btn btn-danger ml-4"  href="{{route('orders.index')}}" role="button">Your Orders</a>
                  @else
                  <a class="btn btn-danger ml-4"  href="{{route('orders.Customerindex')}}" role="button">Your Orders</a>
                  @endif
                </div>
              </div>


@foreach($discussions as $d)
<center>

    <div class="col-md-8">
      <div class="card card-default mb-3">
        <div class="card-header">
          <div class="text-left">


            <b><h4>{{$d->user->name}}</h4></b>
            {{$d->created_at->diffForHumans()}}

          </div>
          <div class="text-right">
            <a href="{{route('discussion',['slug'=>$d->slug])}}" class="btn btn-primary pull-right" >View</a>

          </div>

        </div>
        <div class="card-body">
          <p class="text-center">
            <h3>{{$d->title}}</h3>
          </p>


          <p class="text-center">
  {{$d->content}}

           </p>
           <div class="card-footer">
<div class="text-left">
 {{$d->replies->count()}} Replies
</div>

           </div>
            </center>

        </div>
    @endforeach

  </div>
</div>
        <div class="row justify-content-center">
          <div class="text-center">
            {{$discussions->links()}}
          </div>
        </div>

@endsection
