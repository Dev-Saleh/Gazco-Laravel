@extends('layouts.admin_dashboard')
@section('content')

   <article id="Content" class="content-area p-10 bg-gray-100 h-full">
      
     <style>
          .select_wrap .default_option:before {
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
        
          .select_wrap.active .select_ul {
            opacity: 1;
          }
        
          .select_wrap.active .default_option:before {
            top: 25px;
            transform: rotate(-225deg);
          }
        
        
        
        
        
          nav {
            position: relative;
            overflow: hidden;
            background: #34495e;
            border-radius: 8px;
            font-size: 0;
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1);
          }
        
          nav a {
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
        
          nav .animation {
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
        
          nav a:nth-child(1) {
            width: 100px;
          }
        
          nav .start-home,
          a:nth-child(1):hover~.animation {
            width: 100px;
            right: 0;
          }
        
          nav a:nth-child(2) {
            width: 110px;
          }
        
          nav a:nth-child(2):hover~.animation {
            width: 110px;
            right: 100px;
          }
        
          nav a:nth-child(3) {
            width: 100px;
          }
        
          nav a:nth-child(3):hover~.animation {
            width: 100px;
            right: 210px;
          }
        
          nav a:nth-child(4) {
            width: 160px;
          }
        
          nav a:nth-child(4):hover~.animation {
            width: 160px;
            right: 310px;
          }
        
          nav a:nth-child(5) {
            width: 120px;
          }
        
          nav a:nth-child(5):hover~.animation {
            width: 120px;
            right: 470px;
          }
     </style>
        

                <div class="p-6 w-full">
        
                  <nav class="navBtn w-full h-12">
                    <a href="{{route('reports.batchReport')}}">الدفعات</a>
                    <a href="{{route('reports.citizenReport')}}">المواطنين</a>
                    <a href="#">المراقبين</a>
                    <a href="#">الموزعين</a>
                    <a href="#">المديريات</a>
                    <div class="animation"></div>
                  </nav>
        
                  <div class="containerSlides h-full w-full p-5">


                      @yield('view')

                    
                    </div>
        
                  </div>
        
                </div>
        

            </main>
          </div>
      <script src="/js/jquery.min.js"></script>
                    <script>
                      $(".default_option").click(function () {
                        $(this).parent().toggleClass("active");
                        $(this).parent().removeClass("hidden");
                  
                      })
                  
                      $(".select_ul li").click(function () {
                        var currentele = $(this).html();
                        $(".default_option li").html(currentele);
                        $(this).parents(".select_wrap").removeClass("active");
                      })
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
  </article>
 @stop