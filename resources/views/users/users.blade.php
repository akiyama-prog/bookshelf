@if (count($users)>0)
    <ul class="list-unstyled">
       <div class="card-deck">
        @foreach($users as $user)
        
            @include('users.usercard')
               
            
        @endforeach
        </div>
    </ul>
    <div class='d-flex justify-content-flex'>{{ $users->links('pagination::bootstrap-4') }}</div>
@endif