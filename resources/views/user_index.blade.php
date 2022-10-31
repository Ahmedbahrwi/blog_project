<h1>All Users</h1>
@foreach($users as $user)

<hr>
<a href="{{ route('user.user_show',$user->user_uid) }}">
    <h3>{{ $user->user_name }}</h3>
</a>
<p> {{ $user->user_email }}</p>

@endforeach