<!-- Rectangular switch -->

<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Add User</div>
                  <div class="card-body">
  
                      <form action="{{ route('blogs.active',$blog->blog_uid) }}" method="POST">
                          @csrf
                          <label class="switch">
                          <input type="checkbox" name="blog_status" value="1" >
                          <span class="slider "name="blog_status" value="1">active</span>
                         <!-- <a href=""></a>-->
                          </label>

            
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

<!-- Rounded switch -->
