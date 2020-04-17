@extends('layouts.app')

@section('content')

    <div class="page-container">
        <md-app>
            <md-app-toolbar class="md-primary">
                <h3 class="md-title" style="flex: 1">Users</h3>

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
                <md-table md-card>
                    <md-table-toolbar>
                        <h1 class="md-title">Users</h1>
                    </md-table-toolbar>

                    <md-table-row>
                        <md-table-head>Name</md-table-head>
                        <md-table-head>Email</md-table-head>
                    </md-table-row>

                    @foreach($users as $user)
                        <md-table-row>
                            <md-table-cell>{{ $user->name }}</md-table-cell>
                            <md-table-cell>{{ $user->email }}</md-table-cell>
                        </md-table-row>
                    @endforeach
                </md-table>

            </md-app-content>
        </md-app>
    </div>
@endsection
