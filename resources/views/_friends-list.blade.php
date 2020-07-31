<h3 class="font-bold text-xl mb-4">Friends</h3>
<ul>
  @forelse (current_user()->follows as $user)
  
    <li class="mb-4">
      <a href="{{ $user->path() }}" class="flex items-center text-sm">
                <img  src="{{$user->avatar}}" 
                alt=""
                class="rounded-full mr-2"
                width="40"
                height="40"
            >
          {{$user->name}}
            </a>
    </li>
    @empty
    <li>No friends yet!</li>
@endforelse
</ul>