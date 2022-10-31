<h1>Blog Id: {{ $blog->blog_uid }}</h1>
<h3>{{ $blog->blog_title }}</h3>
<p>{{ $blog->blog_description }}</p>

<hr>

<a href="{{ route('blog.index') }}">Back</a>
