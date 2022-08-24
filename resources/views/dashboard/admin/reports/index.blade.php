@extends('layouts.admin_dashboard')
@section('content')

   <article id="Content" class=" p-0 bg-gray-100 h-full">
      
     <style>
                .select_wrap .icon-arrow:before {
            content: "";
            position: absolute;
            top: 18px;
            left: 18px;
            width: 6px;
            height: 6px;
            border: 2px solid;
            border-color: transparent transparent #555555 #555555;
            transform: rotate(-45deg);
          }
          .select_wrap.active .icon-arrow:before {
            top: 25px;
            transform: rotate(-225deg);
          }

          .select_wrap.active .select_ul_agent {
            display: block;
            transition: all 0.3 ease-in;
          }

          .select_wrap.active .select_ul_rig {
            display: block;
            transition: all 0.3 ease-in;
          }

          .select_wrap.active .select_ul_dir {
            display: block;
            transition: all 0.3 ease-in;
          }


          




          #nav-reports {
            position: relative;
            overflow: hidden;
            background: #34495e;
            border-radius: 8px;
            font-size: 0;
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1);
          }

          #nav-reports a {
            font-size: 15px;
            text-transform: uppercase;
            color: white;
            text-decoration: none;
            line-height: 50px;
            position: relative;
            z-index: 1;
            display: inline-block;
            text-align: center;
            transition: all .5s ease 0s;
          }

          #nav-reports .animation {
            position: absolute;
            height: 5px;
            /* height: 5px; */
            bottom: 0;
            /* bottom: 0; */
            z-index: 0;
            background: #1abc9c;
            border-radius: 8px;
            transition: all .5s ease 0s;
          }

          #nav-reports a:nth-child(1) {
            width: 100px;
          }

          #nav-reports .start-home,
          a:nth-child(1):hover~.animation {
            width: 100px;
            right: 0;
          }

          #nav-reports a:nth-child(2) {
            width: 110px;
          }

          #nav-reports a:nth-child(2):hover~.animation {
            width: 110px;
            right: 100px;
          }

          #nav-reports a:nth-child(3) {
            width: 100px;
          }

          #nav-reports a:nth-child(3):hover~.animation {
            width: 100px;
            right: 210px;
          }

          #nav-reports a:nth-child(4) {
            width: 160px;
          }

          #nav-reports a:nth-child(4):hover~.animation {
            width: 160px;
            right: 310px;
          }

          #nav-reports a:nth-child(5) {
            width: 120px;
          }

          #nav-reports a:nth-child(5):hover~.animation {
            width: 120px;
            right: 470px;
          }
     </style>
        

         <!-- nvabar of Reports -->
        <div class="p-6 w-full">
          <nav id="nav-reports" class="navBtn w-full h-12">
            <a href="{{route('reports.batchReport')}}" class="{{ 'admin/reports/batchReport' == request()->path() ? 'bg-[#1abc9c]' : '' }}">الدفعات</a>
            <a href="{{route('reports.citizenReport')}}" class="{{ 'admin/reports/citizenReport' == request()->path() ? 'bg-[#1abc9c]' : '' }}">المواطنين</a>
            <a href="#">المراقبين</a>
            <a href="#">الموزعين</a>
            <a href="#">المديريات</a>
            <div class="animation"></div>
          </nav>
        </div>
        <!-- End nvabar of Reports -->
        
        <div class="containerSlides w-full p-6">


          @yield('view')

        
        </div>
        
    </article>    
  </main>
 </div>
      <script src="/js/jquery.min.js"></script>
      <script>
        const dropSelect = (ds) => {
          $(".default_option" + ds).parent().toggleClass("active");
          $(".default_option" + ds).parent().removeClass("hidden");
        }
    
    
        const clickVal = (dd) => {
          $(".select_ul" + dd + " li").click(function () {
            var currentele = $(this).html();
            $(".default_option" + dd + " li").html(currentele);
            $(this).parents(".select_wrap").removeClass("active");
          })
        }
      </script>
      <script>
    
    
        const allSideMenu = document.querySelectorAll('.sidebar a');
        console.log(allSideMenu);
        allSideMenu.forEach(item => {
          // const li = item.parentElement;
    
          item.addEventListener('click', function () {
            allSideMenu.forEach(i => {
              i.classList.remove('bg-indigo-500');
            })
            item.classList.add('bg-indigo-500');
          })
        });
    
    
    
    
        /* NAVBAR Of Reports*/
        const btns = document.querySelectorAll('.navBtn a');
        const slides = document.querySelectorAll('.containerSlides .slide')
        console.log(btns);
        console.log(slides);
        btns.forEach(btn => {
          // const li = item.parentElement;
          btn.addEventListener('click', function () {
            btns.forEach(b => {
              b.style.backgroundColor = "";
            })
            btn.style.backgroundColor = "#1abc9c";
    
            slides.addEventListener('click', function () {
    
              slides.forEach(s => {
                s.classList.remove('hidden');
    
              })
            })
          })
        });
        /* NAVBAR Of Reports*/
    
      </script>
       
 @stop