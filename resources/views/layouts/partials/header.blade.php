<nav class="nav has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item is-brand" href="#">
                <img src="/img/logo.png" alt="Logo">
            </a>
        </div>

        <span class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
        </span>

        <div class="nav-right nav-menu">

            <span class="nav-item">
                @if (Auth::guest())
                <a class="button is-primary" href="/login">
                    <span class="icon">
                        <i class="fa fa-sign-in"></i>
                    </span>
                    <span>Login</span>
                </a>
                @else
                Hi, {{ Auth::user()->name }}!
                <a class="button is-link" href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
        </span>
    </div>
</div>
</nav>