  <div class="header">
      <div class="menu-toggle"><i class="fa-solid fa-bars"></i></div>
      <div class="user-info">
          <div class="user_info_box">
              <div class="name_word">
                  @auth
                      {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                  @endauth
              </div>

              <div class="name">
                  <div class="user_name">
                      @auth
                          {{ auth()->user()->name ?? '' }}
                      @endauth
                  </div>
                  <small>{{ auth()->user()->role ?? '' }}</small>
              </div>
          </div>
          <div class="user_menu_box">
              <ul>
                  <li><a href="{{ route('user.profile.page') }}"> <i class="fa fa-user"></i> Profile</a></li>
                  <li><a href="{{ route('user.security.page') }}"> <i class="fa fa-lock"></i> Security</a></li>
                  <li><a href="{{ route('logout') }}"> <i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
          </div>
      </div>
  </div>
