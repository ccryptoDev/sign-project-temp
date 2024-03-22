<!-- <html>
    <head>
        <base href="../../../../">
        <meta charset="utf-8" />        
        <meta name="description" content="Login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="/assets/css/pages/login/login-2.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />        
        <link rel="shortcut icon" href="/assets/media/logos/logo-letter-13.png" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="stylesheet" href="/assets/css/messagesign.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>        
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class = "bg-white">
        <div class="text-center pt-6" id="choose-message">
            Choose a Message
        </div>
        <div class="pt-6"></div>
        <div class="d-flex px-12 text-center">
            <div class="login-header-logo-image">
                <img src="/assets/media/logos/logo_new.png" alt="logo_image"/>
            </div>
            <div class="filter-description">
                <div>Search for a message by keyword, then use slider or thumbnails to 
                choose an image, click on middle image in the blue box, to choose:</div>
            </div>
            <div class= "qr-code-help">
                <img src="/assets/media/mainmenu/qr_code.png"  alt="qr_code_image"/>
            </div>
        </div>
        <div class="py-3 search-box">
            <div class = "flex-1"></div>
            <div class="d-flex flex-1">
                <label> Search: </label> 
            </div>                       
            <input class="filter-input" name="keyword" value="Speed limit"></input>            
            <div class="flex-2"></div>            
        </div>
        <div class="py-3 d-flex keyword-box">
            <div class = "flex-1"></div>                      
            <div class = "d-flex flex-1">
                <label class="search-hidden"> Search: </label> 
            </div>            
            <label class="text-center searched-keyword">1002-35MPH</label>
            <div class="flex-2"></div>            
        </div>

        <div class="slick">
            @foreach ($images as $image)
                <div>
                    <span>
                        <img src="{{ asset('assets/media/signmessage/' . $image) }}" alt="image" />
                    </span>
                </div>
            @endforeach
            
        </div>

        <div class="py-3 d-flex keyword-box" >
            <div class="flex-1"></div>                      
            <div class="d-flex flex-1">
                <label class="search-hidden"> Search: </label> 
            </div>            
            <label class="text-center searched-keyword-2">Keywords, Speed Limit 35</label> 
            <div class="flex-3"></div>            
        </div>

        <ul class="thumbnail-list">
            @foreach ($images as $image)
                <li>
                    <span>
                        <img src="{{ asset('assets/media/signmessage/' . $image) }}" alt="image" />
                    </span>
                </li>
            @endforeach
                   
        </ul>
        <script src="/assets/js/messagesign.js"></script>           
    </body>
</html> -->

@include('dashboard.header')
    <!-- Aside Container -->
    <div class="d-flex flex-column justify-content-between px-8 py-lg-10 px-lg-24">
        <!-- custom header -->
        <div class="custom-header">
            <div class="page-logo">
                <img  src="/assets/media/logos/logo_new.png" class="login-header-logo-image" alt=""  /> 
            </div>
            <div class="text-center italic page-title">
                <h2>Choose a Message</h2>
                <p>Search for a message by keyword, then use slider or thumbnails to choose an image, click on middle image in the bluebox to choose</p>
            </div>
            <div class="qrcode-form">
                <a href="#">Click for HELP</a>
                <img src="/assets/media/mainmenu/qr_code.png" alt="Sign Controller QRcode">
            </div>
        </div>
        <!-- end: custom-header --> 
    
        <!-- begin::Aside body -->
        <div class="d-flex flex-column-fluid flex-column px-16 page-container message-menu">
            <div class="main-menu">
                <div class="menu-item"> 
                    <input name="keyword" value="Speed Limit"></input>
                </div>
                <div class="menu-item"> 
                    <input name="id-name" value="1002-35MPH"></input>
                </div>
                <div class="slick">
                    @foreach ($images as $image)
                    <div>
                        <span>
                            <img src="{{ asset('assets/media/signmessage/' . $image) }}" alt="image" />
                        </span>
                    </div>
                    @endforeach            
                </div>               
                
            </div>
        </div>
        
        <!-- end::Aside body -->    
    </div>    
    <!-- end::Aside Container -->
@include('dashboard.footer')