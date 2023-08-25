  <!-- footer -->
  <footer>
      <div class="container">
          @foreach ($settings as $setting)
              <div class="desc">
                  <p>{{ $setting->address }}</p>
                  {{-- <span>United Kingdom</span> --}}
              </div>

              <ul>
                  <li><a href="{{ $setting->facebook }}"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="{{ $setting->twitter }}"><i class="fa fa-twitter"></i></a></li>
                  {{-- <li><a href="{{$setting->facebook_profile}}"><i class="fa fa-google"></i></a></li> --}}
                  <li><a href="{{ $setting->instagram }}"><i class="fa fa-instagram"></i></a></li>
              </ul>
          @endforeach

          <p>Copyright © All Right Reserved</p>
      </div>
  </footer>
  <!-- end footer -->
