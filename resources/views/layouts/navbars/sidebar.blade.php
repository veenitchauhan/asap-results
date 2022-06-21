<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      <img src="{{ url('/img/logo-100x74.png') }}" alt="">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
          <p class="font-weight-bold">{{ __('Dashboard') }}</p>
        </a>
      </li>
      @can('is-admin')
      <li class="nav-item{{ $activePage == 'user' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">groups</i>
          <p class="font-weight-bold">{{ __('Manage Staff') }}</p>
        </a>
      </li>
      @endcan
      <li class="nav-item{{ $activePage == 'location' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('location.index') }}">
          <i class="material-icons">navigation</i>
          <p class="font-weight-bold">{{ __('Locations') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'collection' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('collection.index') }}">
          <i class="material-icons">workspaces</i>
          <p class="font-weight-bold">{{ __('Patient Collections') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'test_type' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('test_type.index') }}">
          <i class="material-icons">medical_information</i>
          <p class="font-weight-bold">{{ __('Test Types') }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="true">
          <i class="material-icons">settings</i>
          <p class="font-weight-bold">
            Settings
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ $activePage == 'profile' ? 'show' : '' }}" id="settings">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="material-icons pt-1">edit_note</i>
                <p class="font-weight-bold">{{ __('Edit Profile') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i class="material-icons pt-1">lock_reset</i>
                <p class="font-weight-bold">{{ __('Change Password') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>