@extends ('layouts.app')


@section("content")
<div class="row justify-content-center">

  <div class="col-md-8">

    <div class="table-responsive">
                                        <table class="table table-bordered" id="bootstrap-data-table" >
                                            <thead>
                                                <tr>

                                                  <th>Your Project Link<i class="fa fa-fw fa-sort"></th>
                                                  <th>Are You Satisfied?</th>
                                                  <th>Rate the Freelancer</th>

                                                </tr>
                                            </thead>
                                              <tbody>
                                              @foreach($showdata as $sh)
                                              <tr>
                                                <td>{{$sh->content}}</td>
                                                <td><button type="button" class="btn btn-success">Yes</button></td>
                                                <td>
                                                  <input name="content" type="number" placeholder="Paste Project drive link">
                                                <button type="button" class="btn btn-success">Submit</button></td>



                                              </tr>

                                              @endforeach

                                            </tbody>
                                        </table>

                                          </div>
  </div>

</div>

@endsection
