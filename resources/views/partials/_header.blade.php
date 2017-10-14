<nav class="uk-tile-secondary uk-padding uk-padding-remove-vertical" uk-navbar>
  <div class="uk-navbar-left">
    <a href="{{ route('welcome') }}" class="uk-navbar-item uk-logo">{{ config('app.name', 'Laravel') }}</a>
  </div>
  <div class="uk-navbar-right">
    @guest
      <ul class="uk-navbar-nav">
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
      </ul>
    @else
        <ul class="uk-navbar-nav">
          <li>
            <a href="#">{{ auth()->user()->name }}</a>
            <div uk-dropdown="offset: -20">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li class="uk-active uk-text-uppercase">
                      <a href="{{ route('logout') }}" class="uk-text-background"
                         onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               Logout
                      </a>
                    </li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </li>
        </ul>
    @endguest
  </div>
</nav>
