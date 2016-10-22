<nav class="nav has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item is-brand" href="#">
                <img src="/img/logo.jpg" alt="Logo">
            </a>
            @unless(Auth::guest())
            <a class="nav-item" href="/orders">
                All Orders
            </a>
            <a class="nav-item" href="/menu">
                Menu Items
            </a>
            <span class="nav-item">
                <a href="/orders/create" class="button is-primary is-outlined">
                    <span>Create Order</span>
                    <span class="icon"><i style="font-size: 12px;" class="fa fa-plus"></i></span>
                </a>
            </span>
            @endunless
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
                <span>Login</span>
                <span class="icon">
                    <i class="fa fa-sign-in"></i>
                </span>
            </a>
            <a class="button is-light" href="/register">
                <span>Register</span>
                <span class="icon">
                    <i class="fa fa-lock"></i>
                </span>
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