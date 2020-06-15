@extends ('layouts.app')


@section("content")
<div class="row justify-content-center">

  <div class="col-md-8">

    <div class="table-responsive">
                                        <table class="table table-bordered" id="bootstrap-data-table" >
                                            <thead>
                                                <tr>

                                                  <th>Description of Project<i class="fa fa-fw fa-sort"></th>
                                                  <th>DeadLine</th>
                                                  <th>Price for the Project</th>
                                                  <th>Post drive Link of Project</th>

                                                </tr>
                                            </thead>
                                              <tbody>
                                              @foreach($showdata as $sh)
                                              <tr>
                                                <td>{{$sh->description}}</td>
                                                <td>{{$sh->date_limit}}</td>
                                                <td>{{$sh->money}} tk</td>

                                                  <td>
                                                      <form action="{{route('orders.store',['id'=>$sh->user_id])}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                    <input name="content" placeholder="Paste Project drive link">
                                                    <button  class="btn btn-primary">Post Link</button>
                                                      </form>
                                                  </td>


                                              </tr>

                                              @endforeach

                                            </tbody>
                                        </table>

                                          </div>
  </div>

</div>

@endsection
