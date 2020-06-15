@extends ('layouts.app')


@section("content")

<div class="row justify-content-center" style="padding:50px">
<div class="col-md-10">
  <div class="card mb-4">
    <div class="card-header">
    Profile

    </div>
  <div class="card-body">
    @foreach($showdata as $dat)


                <center>
                    <img src="{{ asset('storage/' . $dat->image) }}"  width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading">{{Auth::user()->name}}</h3>
                    <span><h5>{{$dat->type_of_developer}}</h5></span>
                    <span><strong>
                      Skills:
                    </strong>  {{$dat->skills}}</span>


                    <p class="text-left"><strong>Bio: </strong>
                      {{$dat->bio}}                           </p>
                      <p class="text-left"><strong>Work Link: </strong>
  {{$dat->work_link}}
                      </p>
                      </center>
</center>
@endforeach
</div>
</div>
</div>
</div>
 @endsection
