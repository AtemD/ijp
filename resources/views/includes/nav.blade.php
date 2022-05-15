<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        @guest
        <a class="navbar-brand" href="{{url('/')}}">
            <span class="text-teal text-capitalize"><b>IJP</b></span>
        </a>
        @else
            @if(auth()->user()->getAttributes()['user_type'] == \App\Models\User::TYPE_APPLICANT)
            <a class="navbar-brand" href="{{ route('applicant.home') }}">
                <span class="text-teal text-capitalize"><b>IJP</b></span>
            </a>
            @elseif(auth()->user()->getAttributes()['user_type'] == \App\Models\User::TYPE_COMPANY)
            <a class="navbar-brand" href="{{ route('company.home') }}">
                <span class="text-teal text-capitalize"><b>IJP</b></span>
            </a>
            @endif
        @endguest

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registerrr') }}</a>
                </li> -->
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->full_name }} <span class="caret"></span>
                    </a>

                    @if(auth()->user()->getAttributes()['type'] == \App\Models\User::TYPE_APPLICANT)
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-item" href="#">
                            <i class="nav-icon fas fa-heart mr-2"></i>{{ __('Favorites') }}
                        </a>
                        <a class="dropdown-item nav-item" href="#">
                            <i class=" nav-icon fas fa-comments mr-1"></i>{{ __('Messages') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('applicant.place-requests.received.index') }}">
                            <i class="fas fa-paper-plane mr-1"></i> {{ __('Requests') }}
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-percent mr-2"></i> {{ __('Matches') }}
                        </a>

                        <a id="navbarNested" class="dropdown-item dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cogs"></i> {{ __('Account Settings') }}
                        </a>

                        <div class="dropdown-menu dropright" aria-labelledby="navbarNested">
                            <a href="{{ route('applicant.basic-profile.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Basic Profile</a>
                        </div>

                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @elseif(auth()->user()->getAttributes()['type'] == \App\Models\User::TYPE_COMPANY)
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a id="navbarNested" class="dropdown-item dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cogs"></i> {{ __('Account Settings') }}
                        </a>

                        <div class="dropdown-menu dropright" aria-labelledby="navbarNested">
                            <a href="{{ route('company.basic-profile.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Basic Profile</a>
                            <a href="{{ route('company.place-preferences.index') }}" class="dropdown-item nav-item"><i class="fas fa-cog mr-2"></i>Place Preferences</a>
                        </div>

                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @endif
                </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>