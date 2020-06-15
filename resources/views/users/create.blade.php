@extends ('layouts.app')


@section("content")

<div class="row justify-content-center" style="padding:50px">
<div class="col-md-10">
  <div class="card mb-4">
    <div class="card-header">
      {{isset($userse) ? 'Edit Profile':'Create Profile'}}

    </div>

  @if($errors->any())
      <div class="alert alert-danger">
          <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
                {{$error}}
            </li>
            @endforeach
          </ul>
      </div>
    @endif
    <div class="card-body">
      <form action="{{isset($userse) ? route('users.update', $userse->id):route('users.store')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group ">
        <label for="bio">Bio</label>
        <textarea class="form-control" rows="5" cols="15" type="text" name="bio">{{isset($userse) ? $users->bio :''}}</textarea>
      </div>

      <div class="form-group ">
        <label for="content">Work Link</label>
        <textarea class="form-control" rows="5" cols="5" type="text" name="work_link">{{isset($userse) ? $users->work_link:''}}</textarea>
      </div>

         <div class="form-group ">
           <label for="content">Skills</label>
           <textarea class="form-control" rows="5" cols="5" type="text" name="skills">{{isset($userse) ? $users->skills:''}}</textarea>
         </div>

         <div class="form-group">
       <select class="form-control" name="type_of_developer">
       <option  value="Web Developer">Web Developer</option>
       <option  value="Graphics Designer">Graphics Designer</option>
       <option  value="Web Designer">Web Designer</option>
       </select>
       </div>


      @if(isset($user))
      <div class="form-group">
        <label for="image">Image</label>
        <img src="{{ asset('storage/' . $users->image) }}" width="100px" height="100px">
      </div>
      @endif
      <div class="form-group">
      <label for="image">Image</label>
      <input class="form-control" type="file" name="image">
      </div>

      <div class="form-group">
      <button type="submit" class="btn btn-success">{{isset($user) ? 'Update Profile':'Create Profile'}}</button>
      </div>
      </form>
    </div>
  </div>

</div>
</div>









@endsection

@section('script')
@endsection
