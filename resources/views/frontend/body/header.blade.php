 <!-- navbar -->
 <div class="navbar">
     <div class="container">
         <div class="row">
             <div class="col s3">
                 <div class="content-left">
                     <a href="#slide-out" data-target="slide-out" class="sidenav-trigger"><i class="fa fa-bars"></i></a>

                 </div>
             </div>
             {{-- {{ dd($settings) }} --}}
             <div class="col s6">
                 <div class="content-center">
                     <a href="{{ url('/') }}">
                         @foreach ($settings as $setting)
                             <h1>{{ $setting->firm_name }}</h1>
                         @endforeach

                     </a>
                 </div>
             </div>
             <div class="col s3">
                 <div class="content-right">
                     <a href="reservation.html"><i class="fa fa-clipboard"></i></a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- end navbar -->
