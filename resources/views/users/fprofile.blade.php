@extends ('layouts.app')


@section("content")


<div class="row justify-content-center" style="padding:50px">
<div class="col-md-10">
  <div class="card mb-4">
    <div class="card-header">
    Profile

    </div>
  <div class="card-body">



                <center>
                    <img src="{{ asset('storage/' . $profile->image) }}"  width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading">{{$profile->user->name}}</h3>
                    <span><h5>{{$profile->type_of_developer}}</h5></span>
                    <span><strong>
                      Skills:
                    </strong>  {{$profile->skills}}</span>


                    <p class="text-left"><strong>Bio: </strong>
                      {{$profile->bio}}                           </p>
                      <p class="text-left"><strong>Work Link: </strong>
  {{$profile->work_link}}
                      </p>
                  <div class="text-left">
                    <form action="{{route('users.order',['id'=>$profile->user->id])}}" enctype="multipart/form-data" method="POST">
                      @csrf

                     <div class="form-group">
                       <label for="title">Price</label>
                       <input class="form-control" type="text" name="money" placeholder="Price">
                     </div>

                     <div class="form-group ">
                       <label for="content">Description</label>
                       <textarea class="form-control" rows="5" cols="5" type="text" name="description" placeholder="Describe Your Project" ></textarea>
                     </div>
                     <div class="form-group">
    <label for="published_At">DeadLine</label>
    <input type='text' class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="date_limit" value="Give Your DeadLine" >
  </div>

                     <div class="form-group">
                       <button type="submit" class="btn btn-success">Order</button>
                     </div>
                   </form>

                  </div>
</center>

</div>
</div>
</div>
</div>



 @endsection
 @section('script')

 @endsection
