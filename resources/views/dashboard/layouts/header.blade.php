<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">SIAKAD</a>

    <ul class="navbar-nav">
        <li class="nav-item px-3">
            <form action="/logout" method="post">
                @csrf
                <button class="nav-link" type="submit">Logout</button>
            </form>
        </li>
    </ul>
  </header>
