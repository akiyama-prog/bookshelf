<header>
    <nav class="navbar navbar-expand-sm navbar-dark nav fixed-top">
        <a class="navbar-brand" href="/">Bookshelf</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item">{!! link_to_route('users.index','Users',[],['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('users.show','My page',['id'=> Auth::id()],['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('logout.get','Log out',[],['class' => 'nav-link']) !!}</li>
        
                @else
                    <li class="nav-item">{!! link_to_route('signup.get','Signup',[],['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login','Login',[],['class' => 'nav-link']) !!}</li>
                @endif
            
            </ul>
        </div>
    </nav>
</header>