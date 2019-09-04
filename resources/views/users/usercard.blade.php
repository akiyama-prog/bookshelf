<div style="width:10rem;">
<div class="card">
    <div class="card-header">
        <h4 class="card-title text-center">{{ $user->name }}</h4>
         
    </div>
    <div class="card-body">
        <img class="rounded img-fluid" src="{{ Gravatar::src($user->email,500) }}" alt="">
        <div class="text-center">
        <p class="mt-3 mb-0 border-bottom">Favorites</p>
        @if($user->favorite_genres)
        <p class="mt-0 mb-0">{{ $user->favorite_genres }}</p>
        @endif
        
        @if($user->favorite_author)
        <p class="mt-0 mb-0">{{ $user->favorite_author }}</p>
        @endif
        <p>{!! link_to_route('users.show','View profile',['id' => $user->id]) !!}</p>
        </div>
    </div>
</div>
</div>