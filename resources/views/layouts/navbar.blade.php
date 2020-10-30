<nav class="navbar navbar-inverse navbar-fixed-top" >
  <div class="container-fluid" style="height:58px;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{route('index')}}">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{app()->getLocale()}}
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <li><a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a></li>
                
            @endforeach
        </ul>
      </li>
      @auth
        <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      @else
        <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="{{route('getLogin')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      @endauth
      
    </ul>
  </div>
</nav>
  

