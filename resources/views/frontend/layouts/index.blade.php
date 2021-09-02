<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>EK Management Consulting  Ltd </title>
        <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{asset('public/frontend/css/print.css')}}" type="text/css" media="print" />

        </head>
        <body>
        <div id="page">
        <img src="{{asset('public/frontend/images/logo/logo.jpg')}}" align="right" height=140>
        <div id="header">
            <div id="headertitle">
            <h1>
               <a href="{{url('/')}}" title="EK Management ConsultingLtd">EK Management Consulting Ltd</a>
            </h1>
                <p>enabling organisation excellence</p>
            </div> 
        </div>
        <div id="navbar">
        <ul id="nav">
            @foreach(App\MenuFrontend::where('status',1)->get() as $menuItem)
            @if( ! $menuItem->submenu->isEmpty() )
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ $menuItem->menu_name }}
              </a>
            @else
              <li>
              <a href="{{ $menuItem->url }}">{{ $menuItem->menu_name }}</a>
              {{-- <a href="{{ route('menu.item',['id'=>$menuItem->url]) }}">{{ $menuItem->menu_name }}</a> --}}

            @endif
          
            @if( ! $menuItem->submenu->isEmpty())
                <ul class="dropdown-menu" role="menu">
                    @foreach($menuItem->submenu as $subMenuItem)
                    @if($subMenuItem->status == 1)
                        <li>
                            <a href="{{ $subMenuItem->link }}">{{ $subMenuItem->submenu_name }}</a>
                            {{-- <a href="{{ route('menu.submenu.item',['menu'=>$menuItem->url,'submenu'=>$subMenuItem->link]) }}">{{ $subMenuItem->submenu_name }}</a> --}}

                        </li>
                        @endif
                    @endforeach
                </ul>
            @endif
            </li>
          @endforeach
        </ul>
        </div>
         @yield('content')
        </div> <!-- page -->
        </body>
        </html>