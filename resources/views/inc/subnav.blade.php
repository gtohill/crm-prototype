<nav class="navbar navbar-expand-lg navbar-light bg-light">    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/companies">Companies</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/tasks">Tasks</a>
        </li>
      </ul>
      <form action="/dashboard/queryresults" method="GET" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" name="find" type="search" placeholder="Search" aria-label="Search">
        <input type="submit" value="Search">
      </form>
    </div>
  </nav>