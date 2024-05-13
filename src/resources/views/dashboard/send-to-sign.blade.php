@include('dashboard.header')

<div class="fluid bg-white">
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
            <!-- <a href="#">Click for HELP</a> -->
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
</div>

<div class="fluid bg-white">
    <div class="send-button d-flex justify-content-center">
        <button class="btn btn-primary" type="button" id="send">Send</button>
        <button class="btn btn-primary" type="button" id="edit">
            Edit
        </button>
        <button class="btn btn-primary" type="button" id="create">
            <a href="{{ route('edit-message', ['id' => 0]) }}">Create New</a>
        </button>
        <button class="btn btn-primary" type="button" id="exit">
            <a href="{{ route('main-menu') }}">Exit</a>
        </button>
        <!-- <button 
            class="btn" 
            type="button" 
            id="send"
        >
            <span>Open</span>
            <span>this</span>
            <span>Item</span>
        </button> -->
    </div>

    <div class="slider-panel px-8">
        <div id="slickPanel" class="slick-panel">

        </div>
    </div>

    <!-- search form -->
    <div class="px-8 search-form">
        <div class="search-item">
            <label class="italic">Search for these &nbsp; names/keywords</label>
            <input class="form-control search-input" 
                name="keyword" 
                id="firstSearch" 
                placeholder="Please type first keyword"
            >
        </div>
        <div class="search-item">
            <label class="italic">Item Names</label>
            <input class="form-control search-input text-center"
                id="information"
                value=""
                placeholder="The information of selected sign will be displayed here" 
                disabled
            >
        </div>
    </div>
    <!-- end::search form -->

    <!-- <div class="d-flex flex-column justify-content-between px-8 pt-10 pb-0 px-lg-24">
        <div class="px-16">
            <div class="main-menu">
                <div class="search-item">
                    <input class="form-control search-input"
                        name="id-name"
                        id="secondSearch" 
                        placeholder="Please type second keyword"
                    >
                    </input>
                </div>
            </div>
        </div>
    </div> -->

    <div class="d-flex flex-column justify-content-betfween px-8 py-lg-10 px-lg-24">
        <div class="d-flex flex-column-fluid flex-column px-12 page-container message-menu">
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

@include('dashboard.footer')

<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script src="/assets/js/messagesign.js"></script>
<!-- <script src="/assets/js/redirect.js"></script> -->
<script>
    
    // var images = {!! json_encode($images) !!};
    var images = @json($images);

    images = images.map((image, index) => (
        { 
            id: index,
            number: image.no, 
            name: image.name,  
            path: image.path,
            keywords: image.keywords
        }
    ));

    console.log(images);

    var firstIndex = 0, secondIndex = 0;
    var firstSelectedImages = images, secondSelectedImages = [];

    $('#edit').on('click', function() {
        var messageId = firstSelectedImages[firstIndex].number;

        // var editUrl = '{{ route('edit-message', ['id' => ':id']) }}';
        // editUrl = editUrl.replace(':id', messageId);

        var editUrl = '{{ url('/edit-message/') }}' + '/' + messageId;
        window.location.href = editUrl;
    });

    $("#send").on("click", function () {
        event.preventDefault();

        if (firstSelectedImages[firstIndex]) {
    
            console.log('selected image ID: ', firstSelectedImages[firstIndex].id);
            console.log('selected image Name: ', firstSelectedImages[firstIndex].name);

            const {value: confirmed} = Swal.fire({
                title: "Send a message to Sign",
                text: 'Are you sure to send the current selected message to Sign?',
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Yes, I am sure",
                customClass: {
                    confirmButton: "btn-danger",
                },
            }).then(function(result) {
                if( result.isConfirmed) {
                    $.ajax({
                        // url : '/send-image-socket',
                        url : '/send-image-test',
                        type : "POST",
                        data : {
                            imageName: images[firstSelectedImages[firstIndex].id].name,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success : function(res){
                            if (res.success) {
                                console.log(res);
                                toastr.success('The selected message is successfully sent!');
                            }
                            else {
                                toastr.error("Something went wrong, please try again.");    
                            }
                        },
                        error : function(err){
                            toastr.error("Please refresh your browser");
                        }
                    });
                }
            });
        } else {
            toastr.error("Please select image.");
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

    $("#firstSearch").on('keyup', function(e) {
        
        var value = $("#firstSearch").val().toLowerCase().trim();
        firstSelectedImages = images.filter(image => image.name.toLowerCase().trim().includes(value));

        $("#slickPanel").html('<div class="slick" id="slick"></div>');
        for (var i = 0; i < firstSelectedImages.length; i++) {

            var component = `<div><span><img src="{{ asset('assets/media/signmessage/${firstSelectedImages[i].name}') }}" data-slide-no="` + firstSelectedImages[i].id + `" data-id="` + firstSelectedImages[i].number + `"  alt="image" /></span></div>`;
            $("#slick").append(component);

        }

        // initialization
        // firstIndex = 0;
        // if (firstSelectedImages.length > 0) {
        //     var name = firstSelectedImages[firstIndex].name;
        //     $("#information").val(name);
        // } else {
        //     $("#information").val("");
        // }

        slickFunction();

        $("#thumbnail-list").html('');
        secondSelectedImages = images.filter(image => image.name.toLowerCase().trim().includes(value));
        for (var i = 0; i < secondSelectedImages.length; i++) {
            var component = `<li><span><img src="{{ asset('assets/media/signmessage/${ secondSelectedImages[i].name }' ) }}" data-slide-no="` + secondSelectedImages[i].id + `" data-id="` + secondSelectedImages[i].number + `"  alt="image" /></span></li>`;
            $("#thumbnail-list").append(component);
        }

        addClassFunction();
        // secondSearch();
    });

    $("#secondSearch").on('keyup', function(e) {
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

    // Load a slider with all the messages
    $("#slickPanel").html('<div class="slick" id="slick"></div>');
    for (var i = 0; i < images.length; i++) {
        // var component = `<div><span><img src="{{ asset('assets/media/signmessage/${images[i].name}') }}" data-id="${images[i].id}" alt="image" /></span></div>`;
        var component = `<div><span><img src="{{ asset('assets/media/signmessage/${images[i].name}') }}" data-slide-no="${images[i].id}" data-id="${images[i].number}" alt="image" /></span></div>`;
        $("#slick").append(component);
    }

</script>

</body>

</html>