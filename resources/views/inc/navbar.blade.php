<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <a class="navbar-brand" href="#">Virtuagym</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="navbar-nav">
      <li class="nav-item {{Request::is('/') ? 'active' : ''}}"><a class="nav-link" href="/plans">Home</a></li>
      <li class="nav-item {{Request::is('todo/create') ? 'active' : ''}}"><a class="nav-link" href="{{ url('plans')}}">Workout Plans</a></li>
      <li class="nav-item {{Request::is('todo/create') ? 'active' : ''}}"><a class="nav-link" href="{{ url('users')}}">Users</a></li>
    </div>
  </div>
</nav>
