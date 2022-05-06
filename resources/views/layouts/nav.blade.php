<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          @if(!Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="login">登入</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('user/create') }}">註冊</a>
          </li>
          @endif
          @if(Auth::check())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              會員管理
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ url('user/' . Auth::user()->id . '/edit') }}">修改資料</a></li>
              
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout">登出</a></li>
              
            </ul>
          </li>
          @endif
        </ul>
        
      </div>
    </div>
  </nav>