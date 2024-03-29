@include('dashboard.header')
<!-- Aside Container -->
<!-- full background -->
<div class="fluid bg-white">
    <!-- page outer -->
    <div class="d-flex overflow-hidden">
        <div class="d-flex flex-column justify-content-betfween px-8 py-lg-10 px-lg-24">
            <!-- custom header -->
            <div class="custom-header">
                <div class="page-logo">
                    <img src="/assets/media/logos/logo_new.png" class="login-header-logo-image" alt="" />
                </div>
                <div class="text-center italic page-title">
                    <h2>Choose a Message</h2>
                    <p>Search for a message by keyword, then use slider or thumbnails to choose an image, click on
                        middle image in the bluebox to choose</p>
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
                    <div class="search-item">
                        <label class="italic">Search: </label>
                        <input class="search-input text-center" name="keyword" value="Speed Limit"></input>
                    </div>
                    <div class="search-item">
                        <label class="visible-hidden italic">Search: </label>
                        <input class="search-input text-center" name="id-name" value="1002-35MPH"></input>
                    </div>

                    <div>
                        <button class="btn btn-danger mt-0 d-inline mr-3" type="button" id="send">Send</button>
                    </div>
                </div>
            </div>
            <!-- end::Aside body -->
        </div>
    </div>
</div>
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
<div class="fluid bg-white">
    <!-- page outer -->
    <div class="d-flex overflow-hidden">
        <div class="d-flex flex-column justify-content-betfween px-8 py-lg-10 px-lg-24">
            <div class="d-flex flex-column-fluid flex-column px-16 page-container message-menu">
                <div class="main-menu">
                    <div class="search-item">
                        <label class="visible-hidden">Search: </label>
                        <input class="search-input text-center" name="id-name" value="1002-35MPH"></input>
                    </div>
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
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/messagesign.js"></script>
<script src="/assets/js/redirect.js"></script>
<script>
    var currentIndex = 0;
    var images = {!! json_encode($images) !!};
    
    $("#send").on("click", function () {
        event.preventDefault();

        if (images[currentIndex]) {
            $.ajax({
                url : '/send-image-socket',
                type : "POST",
                data : {
                    imageName: images[currentIndex],
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : function(res){
                    if (res.success){
                        console.log(res);
                        // toastr.success('Saved the message successfully!');
                    }
                    else{
                        // toastr.error("Something went wrong, please try again.");    
                    }
                },
                error : function(err){
                    // toastr.error("Please refresh your browser");
                }
            })
        } else {
            // toastr.error("Please select image.");
        }
    })
</script>
</body>

</html>