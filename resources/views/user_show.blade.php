<h1>User Id: {{ $user->user_uid }}</h1>
<h3>{{ $user->user_name }}</h3>
<p>{{ $user->user_email }}</p>

<hr>

<a href="{{ route('user.user_index') }}">Back</a>
