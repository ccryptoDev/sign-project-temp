@include('dashboard.header')
<!-- Aside Container -->
<!-- full background -->
<style>
    .form-control {
        font-size: 14px;
    }
    label {
        font-size: 14px;
    }
</style>
<div class="fluid bg-white">
    <!-- page outer -->
    <div class="d-flex overflow-hidden">
        <div class="d-flex flex-column justify-content-betfween px-8 pt-10 pb-5 px-lg-24">
            <!-- custom header  -->
            <div class="custom-header px-4 px-md-16">
                <div class="page-logo">
                    <img  src="/assets/media/logos/logo_new.png" class="login-header-logo-image" alt=""  /> 
                </div>
                <div class="d-none d-sm-block text-center italic page-title">
                    <h2>Work with a Message</h2>
                    <p>This menu allows the user to retrieve or edit existing messages, make new ones or send to the sign</p>
                </div>
                <div class="qrcode-form">
                    <a href="#">Click for HELP</a>
                    <img src="/assets/media/mainmenu/qr_code.png" alt="Sign Controller QRcode">
                </div>
            </div>

            <div class="px-4">
                <div class="d-block d-sm-none text-center italic page-title">
                    <h2>Work with a Message</h2>
                    <p>This menu allows the user to retrieve or edit existing messages, make new ones or send to the sign</p>
                </div>
            </div>  
            <!-- end: custom-header -->

            <!-- begin::Aside body -->
            <div class="d-flex flex-column-fluid flex-column px-16 page-container message-menu">
                <div class="main-menu">
                    <div class="search-item">
                        <!-- <label class="italic">Information: </label> -->
                        <input class="form-control search-input text-center"
                            id="information"
                            value=""
                            placeholder="The information of selected sign will be displayed here" 
                            disabled
                        >
                        </input>
                    </div>
                    <div class="search-item">
                        <!-- <label class="">Search 1: </label> -->
                        <input class="form-control search-input" 
                            name="keyword" 
                            id="firstSearch" 
                            placeholder="Please type first keyword"
                        >
                        </input>
                    </div>
                </div>
            </div>
            <!-- end::Aside body -->
        </div>
    </div>
</div>
</div>
<div id="slickPanel" class="slick-panel"></div>
<div class="fluid bg-white">
    <!-- page outer -->
    <div class="d-flex flex-column justify-content-between px-8 pt-10 pb-0 px-lg-24">
        <div class="px-16">
            <div class="main-menu">
                <div class="search-item">
                    <!-- <label class="">Search 2: </label> -->
                    <input class="form-control search-input"
                        name="id-name"
                        id="secondSearch" 
                        placeholder="Please type second keyword"
                    >
                    </input>
                </div>
            </div>
        </div>
    </div>

            
        
    <!-- <div class="d-flex overflow-hidden"> -->
        <div class="d-flex flex-column justify-content-betfween px-8 py-lg-10 px-lg-24">
            <div class="d-flex flex-column-fluid flex-column px-12 page-container message-menu">
                <!-- <div class="main-menu">
                    <div class="search-item">
                        <label class="visible-hidden">Search: </label>
                        <input class="search-input text-center" name="id-name" id="secondSearch" ></input>
                    </div>
                </div> -->
                <ul class="thumbnail-list" id="thumbnail-list">
                    <!-- @foreach ($images as $image)
                    <li>
                        <span>
                            <img src="{{ asset('assets/media/signmessage/' . $image) }}" alt="image" />
                        </span>
                    </li>
                    @endforeach -->
                </ul>               
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid flex-column px-16 page-container message-menu">
        <div class="main-menu">
            <div class="">            
                <button class="btn btn-danger d-inline my-10" type="button" id="send">Send</button>
            </div>
        </div>
    </div>
<!-- </div> -->

<script src="/assets/js/messagesign.js"></script>
<script src="/assets/js/redirect.js"></script>
<script>
    
    var images = {!! json_encode($images) !!};
    images = images.map((image, index) => ({ id: index, name: image }) );
    
    var firstIndex = 0, secondIndex = 0;
    var firstSelectedImages = [], secondSelectedImages = [];

    $("#send").on("click", function () {
        event.preventDefault();

        if (firstSelectedImages[firstIndex] && firstSelectedImages[firstIndex].id && images[firstSelectedImages[firstIndex].id]) {

            $.ajax({
                url : '/send-image-socket',
                type : "POST",
                data : {
                    imageName: images[firstSelectedImages[firstIndex].id].name,
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

    var secondSearch  = function () {
        var value1 = $("#firstSearch").val().toLowerCase().trim(), value2 = $("#secondSearch").val().toLowerCase().trim();
        secondSelectedImages = images.filter(image => image.name.toLowerCase().trim().includes(value1) && image.name.toLowerCase().trim().includes(value2));

        $("#thumbnail-list").html('');
        for (var i = 0; i < secondSelectedImages.length; i++) {

            var component = `<li><span><img src="{{ asset('assets/media/signmessage/${ secondSelectedImages[i].name }' ) }}" alt="image" /></span></li>`;
            $("#thumbnail-list").append(component);

        }

        addClassFunction();
    }

    $("#firstSearch").on('keyup', function(e){
        
        var value = $("#firstSearch").val().toLowerCase().trim();
        firstSelectedImages = images.filter(image => image.name.toLowerCase().trim().includes(value));

        // console.log(firstSelectedImages);

        $("#slickPanel").html('<div class="slick" id="slick"></div>');
        for (var i = 0; i < firstSelectedImages.length; i++) {

            var component = `<div><span><img src="{{ asset('assets/media/signmessage/${firstSelectedImages[i].name}') }}" alt="image" /></span></div>`;
            $("#slick").append(component);

        }

        // initialization
        firstIndex = 0;
        if (firstSelectedImages.length > 0) {
            var name = firstSelectedImages[firstIndex].name;
            $("#information").val(name);
        } else {
            $("#information").val("");
        }

        slickFunction();
        secondSearch();
    });

    $("#secondSearch").on('keyup', function(e){

        
        secondSearch();        
        
        secondIndex = 0;
        if (secondSelectedImages.length > 0) {
            var name = secondSelectedImages[secondIndex].name;
            // .split(".bmp")[0].split("_").join(" ");
            $("#information").val(name);
        } else {
            $("#information").val("");
        }
    });


</script>
</body>

</html>