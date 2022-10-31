@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Register</div>
                  <div class="card-body">
  
                      <form action="{{ route('blog.updata',$blog->blog_uid) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group row">
                              <label for="blog_title" class="col-md-4 col-form-label text-md-right">Blog Title</label>
                              <div class="col-md-6">
                                  <input type="text" id="blog_title" class="form-control" name="blog_title" required autofocus>
                                  
                              </div>
                          </div>

                          <div class="form-group">
                          <label for="blog_description">Blog Description</label>
                          <textarea class="form-control" id="blog_description" rows="3" name="blog_description"></textarea>
                          </div>
                          
                          </div>
                          <div class="form-group">
                          <label for="blog_img">Image</label>
                          <input type="file" class="form-control-file" id="blog_img" name="blog_img">
                          </div>
                          
                          
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                 Submit
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection