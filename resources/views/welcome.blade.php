<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">
        <title>Laravel</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->

        <!-- Styles -->
        <style>
          a,
          a:focus,
          a:hover {
            color: #fff;
          }

          /* Custom default button */
          .btn-default,
          .btn-default:hover,
          .btn-default:focus {
            color: #333;
            text-shadow: none; /* Prevent inheritence from `body` */
            background-color: #fff;
            border: 1px solid #fff;
          }


          /*
           * Base structure
           */

          html,
          body {
          /*css for full size background image*/
            background: url(http://p1.pichost.me/i/66/1910819.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            
            height: 100%;
            background-color: #060;
            color: #fff;
            text-align: center;
            text-shadow: 0 1px 3px rgba(0,0,0,.5);
           
          }

          /* Extra markup and styles for table-esque vertical and horizontal centering */
          .site-wrapper {
            display: table;
            width: 100%;
            height: 100%; /* For at least Firefox */
            min-height: 100%;
            -webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
                    box-shadow: inset 0 0 100px rgba(0,0,0,.5);
          }
          .site-wrapper-inner {
            display: table-cell;
            vertical-align: top;
          }
          .cover-container {
            margin-right: auto;
            margin-left: auto;
          }

          /* Padding for spacing */
          .inner {
            padding: 30px;
          }
          
          .h1, h1 {
            font-size: 71px;
          }

          /*
           * Header
           */
          .masthead-brand {
            margin-top: 10px;
            margin-bottom: 10px;
          }

          .masthead-nav > li {
            display: inline-block;
          }
          .masthead-nav > li + li {
            margin-left: 20px;
          }
          .masthead-nav > li > a {
            padding-right: 0;
            padding-left: 0;
            font-size: 16px;
            font-weight: bold;
            color: #fff; /* IE8 proofing */
            color: rgba(255,255,255,.95);
            border-bottom: 2px solid transparent;
          }
          .masthead-nav > li > a:hover,
          .masthead-nav > li > a:focus {
            background-color: transparent;
            border-bottom-color: #a9a9a9;
            border-bottom-color: rgba(255,255,255,.25);
          }
          .masthead-nav > .active > a,
          .masthead-nav > .active > a:hover,
          .masthead-nav > .active > a:focus {
            color: #fff;
            border-bottom-color: #fff;
          }

          @media (min-width: 768px) {
            .masthead-brand {
              float: left;
            }
            .masthead-nav {
              float: right;
            }
          }


          /*
           * Cover
           */

          .cover {
            padding: 0 20px;
          }
          .cover .btn-lg {
            padding: 9px 35px;
            padding-bottom: 35px;
            font-weight: bold;
          }


          /*
           * Footer
           */

          .mastfoot {
            color: #999; /* IE8 proofing */
            color: rgba(255,255,255,.5);
          }


          /*
           * Affix and center
           */

          @media (min-width: 768px) {
            /* Pull out the header and footer */
            .masthead {
              position: fixed;
              top: 0;
            }
            .mastfoot {
              position: fixed;
              bottom: 0;
            }
            /* Start the vertical centering */
            .site-wrapper-inner {
              vertical-align: middle;
            }
            /* Handle the widths */
            .masthead,
            .mastfoot,
            .cover-container {
              width: 100%; /* Must be percentage or pixels for horizontal alignment */
            }
          }

          @media (min-width: 992px) {
            .masthead,
            .mastfoot,
            .cover-container {
              width: 700px;
            }
          }

        </style>
    </head>
    <body>
      <div class="site-wrapper">
        <div class="site-wrapper-inner">
          <div class="cover-container">
            <div class="masthead clearfix">
              <div class="inner">
                <h3 class="masthead-brand">
                  <a href="/">{{ trans('messages.twitter') }}</a>
                </h3>

                <ul class="nav masthead-nav">
                  @if (Route::has('login'))
                    <li class="active">
                      <a href="{{ url('/login') }}">{{ trans('messages.login') }}</a>
                    </li>

                    <li>
                      <a href="{{ url('/register') }}">{{ trans('messages.register') }}</a>
                    </li>
                  @endif
                </ul>
              </div>
            </div>
            <div class="inner cover">
              <h1 class="cover-heading">{{ trans('messages.welcome') }}</h1>
              <p class="lead">
                <a class="btn btn-lg btn-primary" href="{{ url('/register') }}">{{ trans('messages.register') }}</a>
              </p>
            </div>
            <div class="mastfoot">
              <div class="inner">
                <p>© 2016 <a href="https://www.facebook.com/phunghangbk">Phung Hang</a></p>
              </div>
            </div>
          </div>
      </div>   
    </body>
</html>
