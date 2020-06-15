@extends('layouts.app')

@section('content')

<center>

    <div class="col-md-8">
      <div class="card card-default mb-3">
        <div class="card-header">

          <div class="text-left">
            @if($discussion->user->role_id==1)
            Freelancer


            @else

              Customer

            @endif
            <b><h4>{{$discussion->user->name}}</h4></b>
            {{$discussion->created_at->diffForHumans()}}

          </div>

        </div>
        <div class="card-body">
          <p class="text-center">
            <h3>{{$discussion->title}}</h3>
          </p>
          <p class="text-left">
          {{$discussion->amounts}}

           </p>

          <p class="text-center">
  {{$discussion->content}}

           </p>
           <div class="card-footer">
<div class="text-left">
 {{$discussion->replies->count()}} Replies
</div>

           </div>


        </div>


  </div>
</div>
@foreach($discussion->replies as $r)
<div class="col-md-8">
  <div class="card card-default mb-3">
    <div class="card-header">
      <div class="text-left">

        @if($r->user->role_id==1)

          Freelancer


        @else

          Customer

        @endif
        <b><h4>{{$r->user->name}}</h4></b>
          {{$r->created_at->diffForHumans()}}
          <div class="text-right">
            @if($r->user->role_id==1)

              <a href="{{route('users.show',['id'=>$r->user->id])}}" class="btn btn-primary pull-right" >Visit Profile</a>

            @else



            @endif


          </div>
      </div>

      </div>
      <div class="card-body">
        @if($r->user->role_id==1 )

        <div class="text-right">
          <b>{{$r->amounts}}</b> tk bid

        </div>



        @else



        @endif
        <div class="text-left">
          {{$r->content}}

        </div>
      </div>
      </div>
      </div>


  @endforeach
<div class="col-md-8">
  <div class="card card-default mb-3">

    <div class="card-body">
      <form action="{{route('posts.reply',['id'=>$discussion->id])}}" enctype="multipart/form-data" method="POST">
        @csrf


         <label for="content"><h4><b>Leave a Comment</b></h4></label>
         @if(Auth::user()->role_id==1)

         <div class="input-group">

    <div class="input-group-prepend mb-3">
      <span class="input-group-text" id="">Tk.</span>
    </div>
    <input name="amounts" class="form-control" >
  </div>





         @endif


 <div class="form-group ">
     <textarea class="form-control" rows="5" cols="5" type="text" placeholder="Provide your link, bio or opinion" name="content" ></textarea>
       </div>
       <div class="form-group">
         <button  class="btn btn-primary">Leave a Comment</button>



       </div>
     </form>

     </div>
      </div>
      </div>
      </center>
@endsection
