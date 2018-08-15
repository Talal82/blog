    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ route('main') }}">Laravel Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link {{Request::is('/') ? "active": "" }}" href="{{ route('main') }}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{Request::is('blog') ? "active": "" }}" href="{{ route('blog.index') }}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('about') ? "active": "" }}" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('contact') ? "active": "" }}" href="{{ route('contact') }}">Contact</a>
          </li>
        </ul>
      </div>
      <div collapse navbar-collapse float-right>

        {{-- out built in nav menu for login and register --}}

                    <ul class="nav mr-auto navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                          <li class="dropdown">
                             <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }}{{--  <span class="caret"></span> --}}
                             </a>

                             <ul class="dropdown-menu">
                                <li>
                                  <a href="{{ route('posts.index') }}">All Posts</a>
                                </li>
                                <li>
                                  <a href="{{ route('categories.index') }}">Categories</a>
                                </li>
                                <li>
                                  <a href="{{ route('tags.index') }}">Tags</a>
                                </li>
                               <li>
                                 <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   Logout
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                 </form>
                                </li>
                                
                             </ul>
                          </li>
                        @endguest
                    </ul>


                    {{-- our customized right nav menu --}}

        {{-- <ul class="nav navbar-nav mr-auto navbar-right">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Logout</a>
            </div>
          </li>
        </ul> --}}

      </div>
    </nav>