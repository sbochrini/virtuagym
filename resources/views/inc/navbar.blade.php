<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <a class="navbar-brand" href="#">Virtuagym</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse">
    <div class="navbar-nav">
      <li class="nav-item {{Request::is('/') ? 'active' : ''}}"><a class="nav-link" href="/">Home</a></li>
      <li class="nav-item {{Request::is('todo/create') ? 'active' : ''}}"><a class="nav-link" href="plans/create">Workout Plans</a></li>
      <li class="nav-item {{Request::is('todo/create') ? 'active' : ''}}"><a class="nav-link" href="users/create">Users</a></li>
    </div>
  </div>
</nav>
