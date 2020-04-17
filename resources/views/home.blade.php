@extends('layouts.app')

@section('content')

<div class="page-container">
    <md-app>
        <md-app-toolbar class="md-primary">
            <h3 class="md-title" style="flex: 1">Dashboard</h3>

            @guest
                <md-button href="{{ route('login') }}">{{ __('Login') }}</md-button>

                @if (Route::has('register'))
                    <md-button href="{{ route('register') }}">{{ __('Register') }}</md-button>
                @endif
            @else
                <md-menu md-size="medium" md-align-trigger>
                    <md-button md-menu-trigger>{{ Auth::user()->name }}</md-button>

                    <md-menu-content>
                        <md-menu-item>
                            <md-button href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </md-button>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </md-menu-item>
                        <md-menu-item>
                            <md-button href="{{ route('admin.users.index') }}">
                                Users Management
                            </md-button>
                        </md-menu-item>
                    </md-menu-content>
                </md-menu>
            @endguest
        </md-app-toolbar>

        <md-app-content>
            <App />
        </md-app-content>
    </md-app>
</div>
@endsection
