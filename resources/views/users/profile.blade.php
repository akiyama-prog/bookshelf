<div class="text-right">
    <h3 class="text-right border-bottom mb-3">Profiel</h3>
    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email,100) }}" alt="">
    <h4 class="mt-3">{{ $user->name }}</h4>
    
    @if($user->favorite_genres)
        <p>Favorite genres: {{ $user->favorite_genres }}</p>
    @endif
    @if($user->favorite_author)
        <p>Favorite author: {{ $user->favorite_author }}</p>
    @endif
    
    @if(Auth::user() == $user)
        {!! link_to_route('users.edit','edit profile',['id' => $user->id],['class'=>'btn btn-outline-info mt-3']) !!}
    @endif
</div>