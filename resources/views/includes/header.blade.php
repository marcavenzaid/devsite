<!--
    This is the default header for pages if the user are not logged in.
 -->

<!-- Navbar not logged in -->
<nav class="navbar navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
      data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand navbar-logo" href="/"><i class="fa fa-laptop fa-2x"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @if(Auth::guest())
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login">Log in</a></li>
          <li><a href="signup">Sign up</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-navicon fa-lg navbar-dropdown"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/">DevSite</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </li>
        </ul>
      @else
        <ul class="nav navbar-nav">
          <li><a href="/post">Post</a></li>
        </ul>

        <!-- Search bar -->
        <form class="navbar-form navbar-left" action="{{ route('searchresults') }}">
          <div class="input-group nav-search">
            <input type="text" class="form-control" name="searchQuery" id="nav-search-bar" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn _btn-default" type="submit" id="nav-search-bar-btn"><i class="fa fa-search fa-lg"></i></button>
            </span>
          </div>
        </form>
      
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="/profile/{{ Auth::user()->username }}">
              <img src="/uploads/profile_pics/{{ Auth::user()->profile_pic }}" class="navbar-profile-pic">
              <div class="nav-name"><span> {{ Auth::user()->first_name }} </span></div>
            </a>
          </li>
          <li><a href="{{ url('home') }}"><i class="fa fa-home fa-lg">&nbsp;</i>Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-navicon fa-lg navbar-dropdown"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/basicinfo"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Profile</a></li>
              <li role="separator" class="divider"></li>
              
              <li><a href="/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log out</a></li>              
            </ul>
          </li>
        </ul>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- /Navbar not logged in -->