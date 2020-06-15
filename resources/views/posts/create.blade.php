@extends ('layouts.app')


@section("content")

<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card card-default">
      <div class="card-header">
        {{isset($post) ? 'Edit post':'Create Post'}}
      </div>
    <div class="card-body">
      <form action="{{isset($post) ? route('posts.update',$post->id):route('posts.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @if(isset($post))
        @method('PUT')
        @endif
       <div class="form-group">
         <label for="title">Title</label>
         <input class="form-control" type="text" name="title" value="{{isset($post) ? $post->title:''}}">
       </div>

       <div class="form-group ">
         <label for="content">Content</label>
         <textarea class="form-control" rows="5" cols="5" type="text" name="content" >{{isset($post) ? $post->content:''}}</textarea>
       </div>


       <div class="form-group">
         <button type="submit" class="btn btn-success">{{isset($post) ? 'Update Post':'Create Post'}}</button>
       </div>
     </form>
    </div>
    </div>

  </div>

  </div>
</div>
@endsection
