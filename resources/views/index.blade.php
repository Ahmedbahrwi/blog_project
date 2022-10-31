<h1>All Blogs</h1>
@foreach($blogs as $blog)

<hr>
<a href="{{ route('blogs.show',$blog->blog_uid) }}">
    <h3>{{ $blog->blog_title }}</h3>
</a>
<p> {{ $blog->blog_description }}</p>

@endforeach