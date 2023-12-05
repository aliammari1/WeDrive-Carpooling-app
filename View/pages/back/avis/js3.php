<! DOCTYPE html>

  <body>

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>WeDrive</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
      <!-- Font Awesome Icons -->
      <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
      <!-- Nucleo Icons -->
      <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
      <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- Popper -->
      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <!-- Main Styling -->
      <link href="../../../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    </head>

    <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">

      <div class="absolute w-full bg-primary dark:hidden min-h-75"></div>

      <!-- sidenav  -->



      <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">


        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
          <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
              <a class="py-2.7 bg-primary/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="./pages/back.html">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Avis</span>
              </a>
            </li>

            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./back.php">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">trajets</span>
              </a>
            </li>


            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./table.php">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">reclamation</span>
              </a>
            </li>

            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/virtual-reality.html">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">reservations</span>
              </a>
            </li>

            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/rtl.html">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">cherhcer</span>
              </a>
            </li>

            <li class="w-full mt-4">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/rtl.html">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                </div>
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages</h6>
            </li>

            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/profile.html">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
              </a>
            </li>

            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/sign-in.html">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-copy-04"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign In</span>
              </a>
            </li>

            <li class="mt-0.5 w-full">
              <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/sign-up.html">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                  <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-collection"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign Up</span>
              </a>
            </li>
          </ul>
        </div>


      </aside>



      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.1/qrcode.js"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"> </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"> </script>
        <title>WeDrive</title>
      </head>
      <style>
        #placeHolder {
          display: none;
        }

        button.center-block {
          margin-top: 20px;
          display: block;
          width: 60%;
          line-height: 2em;
          background: rgba(114, 212, 202, 1);
          border-radius: 5px;
          border: 0;
          border-top: 1px solid #B2ECE6;
          box-shadow: 0 0 0 1px #46A294, 0 2px 2px #808389;
          color: #FFFFFF;
          font-size: 1.5em;
          text-align: center;
          text-shadow: 0 1px 2px #21756A;
        }

        button.center-block:hover {
          background: linear-gradient(to bottom, rgba(107, 198, 186, 1) 0%, rgba(57, 175, 154, 1) 100%);
        }

        button.center-block:active {
          box-shadow: inset 0 0 5px #000;
          background: linear-gradient(to bottom, rgba(57, 175, 154, 1) 0%, rgba(107, 198, 186, 1) 100%);
        }

        button.center-block:focus {
          outline: none;
          border-color: green;
        }

        canvas {
          width: 200px;
        }

        #dBtn {
          display: none;
        }

        h1#heading {
          font-family: 'Major Mono Display', monospace;
        }

        body {
          background-color: #1E90FF;
          justify-content: center;
          font-family: 'VT323', monospace;
          font-size: 1.5rem;
          color: black;
          margin: 20px;
          text-align: center;
        }

        h1 {
          font-weight: normal;
          font-size: 40px;
          font-weight: normal;
          text-transform: uppercase;
          text-align: center;
        }

        h2 {
          text-align: center;
          color: #46a294;
          font-size: 28px;
          width: 100%;
          margin: 10px 10;
          position: relative;
          line-height: 58px;
          font-weight: 400;
        }

        h2:before {
          content: " ";
          position: absolute;
          left: 50%;
          bottom: 0;
          width: 100px;
          height: 2px;
          font-weight: bold;
          background-color: #2079df;
          margin-left: -50px;
        }
      </style>

      <!-- cards row 2 -->
      <div class="flex flex-wrap mt-6 -mx-3">

        <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">

          <h2> QR Code Generator </h2>
          <div class="container mx-auto w-75 py-4 border my-4 bg-light">
            <label for="usr" class="text-dark"> Enter avis: </label>
            <input type="text" class="form-control" id="text" name="username" placeholder="Enter Text Here">
            <a href="javascript:void(0)" class="btn btn-primary btn-lg my-4" onclick="generate();"> Generate </a>
          </div>

          <div class="jumbotron mx-auto w-75 border my-4 py-4 text-center" id="dBtn">
            <div id="placeHolder"> </div>
            <canvas id="myCanvas"> </canvas>
            <br>
            <a href="#" class="btn btn-danger btn-lg" onclick="downloadQrCode(this);" download="QRcode.png"> Download </a>
          </div>
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom p-1 ">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)"> All Rights Reserved 2022 </a>
              </li>
            </ul>
          </nav>
          <script>
            function generate() {
              var typeNumber = 4;
              var errorCorrectionLevel = 'L';
              var qr = qrcode(typeNumber, errorCorrectionLevel);
              var inputText = document.getElementById('text').value;
              qr.addData(inputText);
              qr.make();
              document.getElementById('placeHolder').innerHTML = qr.createImgTag();
              canvasScreen();
            }
            downloadQrCode = function(el) {
              var canvas = document.getElementById("myCanvas");
              var image = canvas.toDataURL("image/png");
              el.href = image;
            };

            function canvasScreen() {
              var a = document.getElementsByTagName("img")[0];
              a.setAttribute("id", "qrcode");
              var canvas = document.getElementById("myCanvas");
              var ctx = canvas.getContext("2d");
              var img = document.getElementById("qrcode");
              ctx.drawImage(img, 70, 0, 150, 150);
              document.getElementById("dBtn").style.display = "block";
            }
          </script>
    </body>

    </html>