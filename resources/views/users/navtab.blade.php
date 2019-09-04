<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="text-muted nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">my bookshelf <span class="badge badge-secondary">{{ $count_book_records }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.book_lists',['id' => $user->id]) }}" class="text-muted nav-link {{ Request::is('users/*/book_lists') ? 'active' : '' }}">book list <span class ="badge badge-secondary">{{ $count_book_lists }}</span></a></li>
    @if(Auth::id() == $user->id)
    <li class="nav-item"><a href="{{ route('book_records.create',['id' => $user->id]) }}" class="text-muted nav-link {{ Request::is('book_records/create') ? 'active' : '' }}">add new book</a></li>
    @endif
</ul>
        