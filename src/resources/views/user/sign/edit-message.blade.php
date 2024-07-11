@include('user.header_new')

<div class="d-flex flex-column justify-content-between px-8 py-10 px-lg-24">
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

    <div class="container">
        <div class="row">
            <div class="card card-custom card-stretch">

                <div class="card-header flex-column message-inform-form"> <!-- mesage name and keywords -->
                    <div class="message-inform"> <!-- name -->
                        <label for="message-name">Name</label>
                        <div>
                            <input class="form-control" 
                                name="message_name" 
                                id="message_name" 
                                placeholder="Input the message name"
                                value="{{ isset($message_data['name']) ? pathinfo($message_data['name'], PATHINFO_FILENAME) : '' }}"
                                {{ isset($message_data['no']) && $message_data['no'] > 0 ? 'disabled' : '' }}
                            >
                            <input class="form-control text-center"
                                name="message_ID"
                                id="message_ID"
                                value="{{ isset($message_data['no']) ? $message_data['no'] : '' }}"
                                disabled
                            >
                        </div>
                    </div> <!-- end: name -->
                    <div class="message-inform"> <!-- keywords -->
                        <label for="message-keywords">Keywords</label>
                        <div>
                            <input class="form-control" 
                                name="message_keywords" 
                                id="message_keywords" 
                                placeholder="Insert a space for multiple keywords"
                                value="{{ isset($message_data['keywords']) ? $message_data['keywords'] : '' }}"
                            >
                        </div>
                    </div> <!-- end: keywords -->
                </div> <!-- end: message name and keywords -->

                <div class="mode"> <!-- mode -->
                    <button class="btn btn-primary" type="button" id="line-mode">3-Line</button>
                    <button class="btn btn-secondary" type="button" id="dot-mode">Dot Draw</button>
                </div> <!-- end: mode -->

                <div class="card-header flex-column messages"> <!-- message editbox -->
                    <div class="message_1 message"> <!-- message 1 -->
                        <div class="align-wrapper">
                            <div class="btn-group text-alignment mr-2" role="group" data-layer="1" aria-label="Basic example"> <!-- alignment 1 -->
                                <button class="btn btn-sm btn-icon btn-light text-left bg-dark" 
                                    data-alignment="left"
                                    id="alignLeftFirst"
                                >
                                    <i class="fas fa-align-left"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-light text-center"
                                    data-alignment="center"
                                    id="alignCenterFirst"
                                >
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-light text-right" 
                                    data-alignment="right"
                                    id="alignRightFirst"
                                >
                                    <i class="fas fa-align-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="message-input">
                            <input 
                                class="form-control" 
                                name="message_1" 
                                id="message_1" 
                                value="{{ $mode == 'edit' && $message_data->draw_mode == 0 ? (isset($message_data->message[0]) ? $message_data->message[0] : '') : '' }}"
                            >
                        </div>
                    </div>  <!-- end: message 1 -->

                    <div class="message_1 message"> <!-- message 2 -->
                        <div class="align-wrapper">
                            <div class="btn-group text-alignment mr-2" role="group" data-layer="2" aria-label="Basic example"> <!-- alignment 2 -->
                                <button class="btn btn-sm btn-icon btn-light text-left bg-dark" 
                                    data-alignment="left"
                                    id="alignLeftSecond"
                                >
                                    <i class="fas fa-align-left"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-light text-center"
                                    data-alignment="center"
                                    id="alignCenterSecond"
                                >
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-light text-right" 
                                    data-alignment="right"
                                    id="alignRightSecond"
                                >
                                    <i class="fas fa-align-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="message-input">
                            <input 
                                class="form-control" 
                                name="message_2" 
                                id="message_2" 
                                value="{{ $mode == 'edit' && $message_data->draw_mode == 0 ? (isset($message_data->message[1]) ? $message_data->message[1] : '') : '' }}"
                            >
                        </div>
                    </div>  <!-- end: message 2 -->

                    <div class="message_1 message"> <!-- message 3 -->
                        <div class="align-wrapper">
                            <div class="btn-group text-alignment mr-2" role="group" data-layer="3" aria-label="Basic example"> <!-- alignment 3 -->
                                <button class="btn btn-sm btn-icon btn-light text-left bg-dark" 
                                    data-alignment="left"
                                    id="alignLeftThird"
                                >
                                    <i class="fas fa-align-left"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-light text-center"
                                    data-alignment="center"
                                    id="alignCenterThird"
                                >
                                    <i class="fas fa-align-center"></i>
                                </button>
                                <button class="btn btn-sm btn-icon btn-light text-right" 
                                    data-alignment="right"
                                    id="alignRightThird"
                                >
                                    <i class="fas fa-align-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="message-input">
                            <input 
                                class="form-control" 
                                name="message_3" 
                                id="message_3" 
                                value="{{ $mode == 'edit' && $message_data->draw_mode == 0 ? (isset($message_data->message[2]) ? $message_data->message[2] : '') : '' }}"
                            >
                        </div>
                    </div>  <!-- end: message 3 -->
                </div> <!-- end: message editbox -->

                <div class="action-group"> <!-- actions -->
                    <button class="btn btn-primary" type="button" id="sendMessage">Send</button>
                    @if(isset($message_data['no']) && $message_data['no'] > 0)
                        <button class="btn btn-primary" type="button" id="saveMessage">Update</button>
                        <button class="btn btn-primary" type="button" id="saveAcopy">Save a Copy</button>
                    @else 
                        <button class="btn btn-primary" type="button" id="saveMessage">Save</button>
                    @endif
                    <button class="btn btn-primary" type="button" id="clearMessage">Clear</button>
                    <button class="btn btn-primary" type="button" id="exit">
                        <a href="{{ route('send-to-sign') }}">Exit</a>
                    </button>
                    <!-- <div class="card-title">
                        <select class="form-control selectpicker d-inline mr-3" id="edit-mode" data-style="btn-success">
                            <option value="0">3-Line Mode</option>
                            <option value="1">Dot-Type</option>
                        </select>
                        <div class="gridControl">
                            <form id="sizePicker" name="gridSize">
                            </form>
                        </div>
                        <button class="btn btn-warning mt-0 d-inline mr-3" type="button" id="createGrid">Set</button>
                    </div> -->
                </div> <!-- actions -->

                <textarea class="form-control d-none" id="dummy" rows="3"></textarea>

                <div class="card-body text-center">  
                    <div id="ledContainer">
                        <div id='wrapperLed' class="row"></div>
                    </div>
                    <canvas id="3LineLed" width="56" height="40" class="d-none"></canvas>

                    {{-- <canvas id="canvas_bg" width="800" height="600" class="d-none"></canvas> --}}
                    <canvas id="canvas" width="700" height="390" class="d-none"></canvas>
                    <div id="gridCanvas" class="gridCanvas rotationTime d-none">
                        {{-- <table id="pixelCanvas" class="flyItIn2"></table> --}}
                        <div id="pixelCanvas" class="row flyItIn2"></div>
                    </div>
                    <canvas id="draw-mode" width="56" height="40" class="d-none"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
@include('user.footer')

<script src="/js/charToLed.js"></script>
<script src="/js/canvastobmp.min.js"></script>
<script src="/js/html2canvas.min.js"></script>

<script>
    const messageData = @json($message_data);
    console.log(messageData);
    const mode = "{{ $mode }}";
    var alignmentList = ['left', 'left', 'left'];   // default ones
    let alignments = [0,0,0];

    const canvasWidth = 56;
    const canvasHeight = 40;
    let drawMode = mode == "create" ? 0 : messageData.draw_mode; // 3-line mode

    var messages = [];
    var isSaveCopy = false;


    const lightOff = function (rowNum, col, mode = 'line') {
        
        for(j = 0; j < canvasWidth; j++) {
            var line_0 = document.createElement('div');
            if (mode != 'line')
                line_0.className = "pixel_" + (rowNum) + "_" + j + " light off";
            else 
                line_0.className = (rowNum) + "_" + j + " light off";
            col.append(line_0);
        }
    }
    
    const addBlankRow = function (length, previousRowNum) {

        for (let i = 0; i < length; i ++) {
            var col = $('<div class="col-md-12 d-flex justify-content-center col blank"/>').appendTo('#wrapperLed');
            lightOff(previousRowNum + i, col, 'line');
        }
    }
    
    const addBlackRow = function (length, previousRowNum, mode) {
        for (let i = 0; i < length; i ++) {
            if (mode == 'line')
                var col = $('<div class="col-md-12 d-flex justify-content-center col"/>').appendTo('#wrapperLed');
            else 
                var col = $('<div class="col-md-12 d-flex justify-content-center col"/>').appendTo('#pixelCanvas');
            lightOff(previousRowNum + i, col, mode);
        }
    }

    // Make the initial screen in 3-line mode
    addBlankRow(2, 0);
    addBlackRow(10, 2, 'line');
    addBlankRow(3, 12);
    addBlackRow(10, 15, 'line');
    addBlankRow(3, 25);
    addBlackRow(10, 28, 'line');
    addBlankRow(2, 38);

    $(document.fonts).ready(function() {
        // assign alignments after loading
        if (mode == 'edit' && messageData.draw_mode == 0) {
            // if (messageData.message1 !== null) {
            //     messages.push( 
            //         messageData.message1.map(innerArray => {
            //             return innerArray.map(item => item === 'true' ? true : item === 'false' ? false : item);
            //         }) 
            //     );
            // } else {
            //     messages.push([]);
            // }
            
            // if (messageData.message2 !== null) {
            //     messages.push( 
            //         messageData.message2.map(innerArray => {
            //             return innerArray.map(item => item === 'true' ? true : item === 'false' ? false : item);
            //         })
            //     );
            // } else {
            //     messages.push([]);
            // }

            // if (messageData.message3 !== null) {
            //     messages.push( 
            //         messageData.message3.map(innerArray => {
            //             return innerArray.map(item => item === 'true' ? true : item === 'false' ? false : item);
            //         })
            //     );
            // } else {
            //     messages.push([]);
            // }

            alignmentList = messageData.three_line_alignment;
            alignmentList.forEach(function(alignment, index) {
                switch (alignment) {
                    case 'left':
                        alignments[index] = 0;
                        break;
                    case 'center':
                        alignments[index] = 1;
                        break;
                    case 'right':
                        alignments[index] = 2;
                        break;
                    default:
                        break;
                }
                // justifyAlignment(index);
            });
            
            $('.btn-group').each(function(index) {
                let alignmentIndex = alignments[index];
                $(this).find('button').removeClass('bg-dark');
                $(this).find(`button:eq(${alignmentIndex})`).addClass('bg-dark');
            });

            messageData.message.forEach(function(msg, index) {
                $('.message-input input').eq(index).val(msg);
                console.log($('.message-input input').eq(index).val());
            });

            displayLED();
        }
        
        function textToLED(theWord){
            var theMessage = [];
            for (var i = 0; i < theWord.length; i++) {
                theMessage.push( transposeArray(charToLED(theWord.charAt(i))) );
                theMessage.push( charToLED() );
            }
        
            var flatten = [];
            flatten = flatten.concat.apply(flatten, theMessage);

            return flatten;
        }

        function justifyAlignment(layer) {

            if (!messages[layer]) return;

            const emptyLetter = [false, false, false, false, false, false, false, false, false, false];
  
            if (alignments[layer] === 0) {

                var emptyLetters = [], afterEmptyLetters = [];

                emptyLetters.push(emptyLetter);

                for (let j = 0; j < canvasWidth - messages[layer].length; j++) {
                    emptyLetters.push(emptyLetter);
                }

                emptyLetters = messages[layer].concat(emptyLetters);
                drawMessage(emptyLetters, layer);

            } else {
                // alignment
                let upwordLength;
                
                if (alignments[layer] === 1) 
                    upwordLength = (canvasWidth - messages[layer].length) / 2;
                else 
                    upwordLength = canvasWidth - messages[layer].length - 1;

                var emptyLetters = [], afterEmptyLetters = [];
                for (let j = 0; j < upwordLength; j++) {
                    emptyLetters.push(emptyLetter);
                }

                emptyLetters = emptyLetters.concat(messages[layer]);

                for (let j = 0; j < canvasWidth - emptyLetters.length; j++) {
                    afterEmptyLetters.push(emptyLetter);
                }
                emptyLetters = emptyLetters.concat(afterEmptyLetters);
                drawMessage(emptyLetters, layer);
                
            }
        }

        function transposeArray(array) {
            return array[0].map((_, colIndex) => array.map(row => row[colIndex]));
        }

        // Get messages from editor
        function getMessage() {
            let temp = [];
            $('.message-input input').each(function() {
                temp.push($(this).val());
            });

            return temp;
        }

        function displayLED() {
            let temp = getMessage();
            clearLights('wrapperLed');
            messages = [];

            let layer = temp.length;
            for (let i = 0; i < layer; i++) {
                letters = textToLED(temp[i]);
                messages.push(letters);
                justifyAlignment(i);
            }
        }

        // message change event in 3-line mode
        $('.message-input input').on('keyup', function(e) {
            displayLED();
        });

        // $("#inputBox").on('keyup', function(e) {
        //     clearLights();
        //     var value = $("#inputBox").val();
        //     messages = [];
            
        //     if(value != '' ) {
        //         var msg = value.split('\n');
        //         var layer = msg.length;

        //         for (let i = 0; i < layer; i++) {
        //             console.log('layer ', i);
        //             myMessage = textToLED(msg[i]);
        //             messages.push(myMessage);
        //             justifyAlignment(i);
        //         }
        //     }
        // });

        function setLight(row, col, state){
            var theLight = $('#wrapperLed').find('.' + row+ '_' + col);
            if(state) {
                theLight.addClass('on');
            } else {
                theLight.removeClass('on');
            }
        }

        function clearLights(target) {
            var lightsOn = $('#' + target).find('.on');
            lightsOn.addClass('off');
            lightsOn.removeClass('on');
        }

        function drawMessage(messageArray, layer){

            // console.log(messageArray);
            // console.log(layer);

            var offsetRow = layer === 0 ? 2 : layer === 1 ? 5 : 8; // start from 15'th row for 2'nd message, start from 28'th row for 3'nd message
            // offsetRow ++;

            var messageLength = messageArray.length;
            var totalScrollLength = canvasWidth + messageLength;

            if(messageLength > 0) {
                for (var col = 0; col < messageLength; col++) {
                    for (var row = 0; row < 10; row++) {
                        var offsetCol = 0 + col;
                        if (offsetCol < canvasWidth || offsetCol >= 0) {
                            setLight(offsetRow + layer * 10 + row, offsetCol, messageArray[col][row]);
                        }
                    }
                }
            }
        }

        var value = "";
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext("2d");
        var undo_lists = [];
        var redo_lists = [];
        var undo_flag = false;

        // const canvas_bg = document.getElementById('canvas_bg');
        // const ctx_bg = canvas_bg.getContext("2d");
        // const bWidth = $('.card-body').width() * 0.8;
        // canvas.width = bWidth;
        // canvas.height = bWidth / 2;
        // let isDown = false;
        // canvas.addEventListener('mousedown', handleOnClick);
        // canvas.addEventListener('touchstart', handleOnClick);
        // canvas.addEventListener('mouseup', handleUpClick);
        // canvas.addEventListener('touchend', handleUpClick);
        // function handleOnClick () {
        //     console.log('down')
        //     isDown = true;
        // }
        // function handleUpClick () {
        //     console.log('up')
        //     isDown = false;
        // }
        canvas.addEventListener('mousemove', handleClick);
        // canvas.addEventListener('touchmove', handleClick);
        var line = 0;
        var x = canvas.width / 2;

        function drawText () {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drawBoard()
            // ctx.font = "120px serif";
            ctx.font = "119px FFFFORWA";
            // lineHeight = ctx.measureText('M').width;
            // ctx.textBaseline = "middle";
            // ctx.fontKerning = "none";

            console.log('drawtext value: ', getMessage());

            const currentMsg = getMessage();
            if (currentMsg.length) {
                currentMsg.map((item, index) => {

                    const alignment = alignmentList[index];
                    ctx.textAlign = alignment;
                    ctx.color = "black";

                    if(alignment == 'left') {
                        ctx.fillText(item, 10, 130 * (index + 1));
                    } else if(alignment == 'center') {
                        ctx.fillText(item, x, 130 * (index + 1));
                    } else {
                        ctx.fillText(item, canvas.width - 10, 130 * (index + 1));
                    }
                    
                    // ctx.fillText(alignment + "-aligned", item, 10 , 100 * (index + 1) + (index == 0 ? 0 : 10 * index));
                })
                if(undo_flag == false) {
                    undo_lists.push(value);
                    undo_flag = false;
                }
            }
        }
        
        function handleClick(e) {
            var flag = false;
            for(let j = 0; j < 3; j++) {
                if(e.offsetY > (100 * j  + 30 * (j + 1)) && e.offsetY < 130 * (j + 1)) {
                    flag = true;
                }
            }
            if(flag == true) {
                canvas.style.cursor = 'text';
            } else {
                canvas.style.cursor = 'default';
            }
        }
        
        var bw = 400;
        // Box height
        var bh = 400;
        // Padding
        var totalRow = 130;
        var blank = 30;
        var j = 1;
        var rows = 3;

        function drawBoard(){
            
            for (let x = 0; x < canvas.width; x += 10) {
                ctx.moveTo(x, 0);
                ctx.lineTo(x, canvas.height);
            }
            // Blank Space
            ctx.fillStyle = "black";
            for(let j = 0; j < rows; j++) {
                ctx.fillRect(0, 0 + (totalRow * j), canvas.width, blank);
            }
            // Editable Space
            ctx.fillStyle = "black";
            for(let j = 0; j < rows; j++) {
                ctx.fillRect(0, 0 + (totalRow * j) + blank, canvas.width, 100);
            }

            for (let y = 0; y < canvas.height; y += 10) {
                ctx.fillStyle = "yellow";
                ctx.moveTo(0, y);
                ctx.lineTo(canvas.width, y);
                if(y > totalRow * j) {
                    j++;
                }
                if(y <= totalRow * j - blank) {
                    ctx.strokeStyle = "white";
                } else {
                    ctx.strokeStyle = "black";
                }
                ctx.lineWidth = 1;
                ctx.stroke();
            }
            // ctx.strokeStyle = "black";
        }

        drawBoard();

        let pathsry = [];
        $("#dummy").focus();
        $(document).on('keyup', function(event) {
            if(event.keyCode == 8) {
                value = value.slice(0, -1);
                drawText();
            }
        })
        $(document).on('click', function(){
            $("#dummy").trigger('tap');
        })
        $("#dummy").on('change', function(e){
            if(e.which == 13) {
                var newArray = value.split("\n");
                if(newArray.length >= 3) {
                    return false;
                }
            }
            value = $(this).val();
            drawText();
        })

        // Text Alignment
        $(".text-alignment .btn").on('click', function() {
            $(".text-alignment .btn").each(function(){
                $(this).removeClass('active');
            })
            $(this).addClass('active');
            // line = value.split("\n").length - 1;
            line = Number($(this).parent().data('layer')) - 1;
            alignmentList[line] = $(this).data('alignment');
            drawText();
        });

        // Switch the mode
        $('.mode .btn').on('click', function(e) {
            let whichMode = e.target.id;
            if (whichMode == 'line-mode') {
                if ($(this).hasClass('btn-secondary')) $(this).removeClass('btn-secondary');
                if (!$(this).hasClass('btn-primary')) $(this).addClass('btn-primary');

                if ($('#dot-mode').hasClass('btn-primary')) $('#dot-mode').removeClass('btn-primary');
                if (!$('#dot-mode').hasClass('btn-secondary')) $('#dot-mode').addClass('btn-secondary');
                drawMode = 0;
            } else {
                if ($(this).hasClass('btn-secondary')) $(this).removeClass('btn-secondary');
                if (!$(this).hasClass('btn-primary')) $(this).addClass('btn-primary');

                if ($('#line-mode').hasClass('btn-primary')) $('#line-mode').removeClass('btn-primary');
                if (!$('#line-mode').hasClass('btn-secondary')) $('#line-mode').addClass('btn-secondary');
                drawMode = 1;
            }

            changeMode();
            // makeGrid();
        });
        
        var changeMode = function() {
            value = "";
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drawBoard();

            if(drawMode == 0) { // 3-line mode
                $('.messages').removeClass('d-none');
                $("#canvas").removeClass('d-none');
                $("#ledContainer").removeClass('d-none');
                $("#inputBox").removeClass('d-none');
                $("#gridCanvas").addClass('d-none');
            } else {
                $('.messages').addClass('d-none');
                $("#gridCanvas").removeClass('d-none');
                $("#ledContainer").addClass('d-none');
                $("#inputBox").addClass('d-none');
                $("#canvas").addClass('d-none');
            }
        }

        changeMode();

        var undoFunction = function () {
            if(undo_lists.length >= 0 && undo_lists[undo_lists.length - 1]) {
                undo_flag = true;
                var poped = undo_lists.pop();
                redo_lists.push(poped);
                if(undo_lists[undo_lists.length - 2]) {
                    value = undo_lists[undo_lists.length - 2];
                    drawText();
                } else if(!undo_lists[undo_lists.length - 2] && undo_lists[undo_lists.length - 1]) {
                    value = undo_lists[undo_lists.length - 1];
                    drawText();
                } else {
                    value = '';
                    drawText();
                }
            }
        }
        $(".undo").click(function(){
            undoFunction();
        })

        function redoAction () {
            if(redo_lists.length >= 0 && redo_lists[redo_lists.length - 1]) {
                undo_flag = true;
                value = redo_lists[redo_lists.length - 1];
                undo_lists.push(redo_lists.pop());
                drawText();
            }
        }
        $(".redo").click(function() {
            redoAction();
        })


        $(document).on('keyup', function(e) {
            if (e.target.id == 'message_name' || e.target.id == 'message_keywords')
                return;

            // if( e.which === 91 && e.ctrlKey){
            //     undoFunction();
            // }
            // else if( e.which === 90 && e.ctrlKey ){
            //     undoFunction();
            // } else if( e.which === 89 && e.ctrlKey ){
            //     redoAction();
            // } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || e.which == 32){
            //     value += e.key;
            //     drawText();
            // } else if(e.keyCode == 13) {
            //     var newArray = value.split("\n");
            //     if(newArray.length >= 3) {
            //         return false;
            //     }
            //     value += "\n";
            //     line ++;
            //     drawText();
            // }
            
            // call this function whenever message is changed.
            drawText();
        });

        // Grid Control
        $(".btn-toggle").on("click", function() {
            $(".gridContainer").toggle();
        })
        // Create a grid that a user can color with clicks
        //   - allows grid size entry and color selection

        // When size is submitted by the user, call makeGrid()

        // Set the inital 'paint' changes happen in click event
        const PAINT = 'PAINT';
        const ERASE = 'ERASE';
        const theGridSize = document.forms.gridSize;
        const userColor = document.getElementById('colorPicker');
        const tileMode = document.getElementById('modeDisplay');
        const displayHeight = document.getElementById('gridHeightDisplay');
        const displayWidth = document.getElementById('gridWidthDisplay');
        const userHeight = document.getElementById('inputHeight');
        const userWidth = document.getElementById('inputWidth');
        const grid = document.getElementById('pixelCanvas');
        const gridCanvas = document.getElementById('gridCanvas');
        let gridTileMode = PAINT // controls paint or erase of grid cells (td's)

        var checkCanvas = function() {
            var canvasLED = document.getElementById('canvas');
            var ctx = canvasLED.getContext('2d');
            var width = canvasLED.width;
            var height = canvasLED.height;

            var imageData = ctx.getImageData(0, 0, width, height);
            var data = imageData.data;

            var isEmpty = true;
            for (var i = 0; i < data.length; i += 4) {
                if (data[i + 3] !== 0) {
                    isEmpty = false;
                    break;
                }
            }

            return isEmpty;
        }

        var convertHTMLtoImage = function () {
            let cols, canvas;
            if (drawMode == 0) {
                cols = document.querySelectorAll('#wrapperLed .col');
                canvas = document.getElementById('3LineLed');
            } else {
                cols = document.querySelectorAll('#pixelCanvas .col');
                canvas = document.getElementById('draw-mode');
            }
            
            let context = canvas.getContext('2d');

            for (let col = 0; col < cols.length; col++) {
                const pixels = cols[col].querySelectorAll('div');
                for (let row = 0; row < pixels.length; row++) {
                    if (pixels[row].classList.contains('on')) {
                        context.fillStyle = 'yellow';
                    } else {
                        context.fillStyle = 'black';
                    }
                    context.fillRect(row, col, 1, 1);
                }
            }

            const width = canvas.width;
            const height = canvas.height;
            const imageData = context.getImageData(0, 0, width, height);
            const data = imageData.data;

            const headerSize = 54;
            const imageSize = width * height * 3; // 3 bytes per pixel (RGB)
            const fileSize = headerSize + imageSize;
            const buffer = new ArrayBuffer(fileSize);
            const view = new DataView(buffer);

            // BMP Header
            view.setUint16(0, 0x424D, false); // 'BM'
            view.setUint32(2, fileSize, true);
            view.setUint32(6, 0, true);
            view.setUint32(10, headerSize, true);

            // DIB Header
            view.setUint32(14, 40, true); // DIB header size
            view.setInt32(18, width, true); // Width
            view.setInt32(22, -height, true); // Height (negative for top-down bitmap)
            view.setUint16(26, 1, true); // Planes
            view.setUint16(28, 24, true); // Bits per pixel (24 for RGB)
            view.setUint32(30, 0, true); // Compression (no compression)
            view.setUint32(34, imageSize, true); // Image size
            view.setInt32(38, 2835, true); // Horizontal resolution (pixels per meter)
            view.setInt32(42, 2835, true); // Vertical resolution (pixels per meter)
            view.setUint32(46, 0, true); // Colors in color table (none)
            view.setUint32(50, 0, true); // Important color count (all colors are important)

            // Pixel data
            let offset = headerSize;
            for (let i = 0; i < data.length; i += 4) {
                view.setUint8(offset, data[i + 2]); // Blue
                view.setUint8(offset + 1, data[i + 1]); // Green
                view.setUint8(offset + 2, data[i]); // Red
                offset += 3;
            }

            const blob = new Blob([buffer], { type: 'image/bmp' });
            return blob;
        }

        function drawModePixelArray() {
            let pixelArray = [];

            for (let row = 0; row < 40; row++) {
                let rowArray = [];
                for (let col = 0; col < 56; col++) {
                    let pixelElement = document.querySelector(`#pixelCanvas .col .pixel_${row}_${col}`);
                    if (pixelElement) {
                        rowArray.push(pixelElement.classList.contains('on') ? 1 : 0);
                    } else {
                        rowArray.push(0); // Default to 0 if element not found
                    }
                }
                pixelArray.push(rowArray);
            }

            return pixelArray;
        }

        var saveMessageCall = function (range, imageFile, imageType) {
            const [msg1 = [], msg2 = [], msg3 = []] = messages;
            let msg = getMessage();

            if (drawMode == 1) msg = drawModePixelArray();

            const formData = new FormData();
            formData.append('imageFile', imageFile);
            formData.append('imageType', imageType);
            formData.append('range', JSON.stringify(range));
            formData.append('mode', parseInt(message_ID, 10) ? 'edit' : 'create');
            formData.append('saveMode', isSaveCopy ? 'saveAcopy' : 'save');
            formData.append('imageID', message_ID);
            formData.append('imageName', message_name);
            formData.append('imageKeywords', message_keywords);
            // formData.append('msg1', JSON.stringify(msg1));
            // formData.append('msg2', JSON.stringify(msg2));
            // formData.append('msg3', JSON.stringify(msg3));
            formData.append('msg', JSON.stringify(msg));
            formData.append('drawMode', drawMode);
            formData.append('three_line_alignment', JSON.stringify(alignmentList)); // e.g ['center', 'left', 'right']

            $.ajax({
                url: '/save-message',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    if (res.success) {
                        if (isSaveCopy) {
                            var newMessageId = res.newID;
                            var newMessageURL = '{{ url('/edit-message/') }}' + '/' + newMessageId;
                            Swal.fire({
                                icon: 'success',
                                title: 'Copy of a message done successfully!',
                                timer: 2000,
                                timerProgressBar: true,
                                onClose: function () {
                                    window.location.href = newMessageURL;
                                }
                            });
                        } else {
                            toastr.success('Saved the message successfully!');
                        }
                    } else {
                        toastr.error("Something went wrong, please try again.");
                    }
                },
                error: function (err) {
                    toastr.error("Please refresh your browser");
                }
            });
        }

        var saveMessage = function (range) {           
    
            // Get base64data of BMP

            if (drawMode == 0) { // 3-line mode
                drawText();
                // CanvasToBMP.toDataURL($("#canvas").first()[0], function (url) {
                //     saveMessageCall(range, url, 'bmp');
                // });
            } 
            const convertedBMP = convertHTMLtoImage();
            saveMessageCall(range, convertedBMP, 'bmp');
        }

        // Get user role
        var getUserRole = async function() {
            try {
                var res = await $.ajax({
                    url: '/get-user-role',
                    type: "GET"
                });

                console.log(res);

                if (res.success) {
                    return res.role;
                } else {
                    throw new Error("Please try to login again!");
                }
            } catch (err) {
                throw new Error("An error occurred while getting permissions. Please refresh!");
            }
        }

        // Stuffs before saving
        var beforeSave = async function() {
            try {
                var role = await getUserRole();

                // step1: check if message is empty
                if (!getMessage().length) {
                    Swal.fire({
                        text: 'Please edit the message',
                        icon: "error",
                        confirmButtonText: "Confirm",
                        customClass: {
                            confirmButton: "btn-danger",
                        },
                    }).then(function(result) {
                        return;
                    });

                    return;
                }

                // step 2: check if message name is defined
                if (message_name == '') {
                    Swal.fire({
                        text: 'The `Name` field is required!',
                        icon: "error",
                        confirmButtonText: "Confirm",
                        customClass: {
                            confirmButton: "btn-danger",
                        },
                    }).then(function(result) {
                        return;
                    });

                    return;
                }

                if (!checkAlphanumeric(message_name)) {
                    Swal.fire({
                        text: 'The Name should only contain alphanumeric characters.',
                        icon: "error",
                        confirmButtonText: "Confirm",
                        customClass: {
                            confirmButton: "btn-danger",
                        },
                    }).then(function(result) {
                        return;
                    });

                    return;
                }

                if (message_ID > 0 && !isSaveCopy) { // in case of edit
                    Swal.fire({
                        text: 'It will update the original one. Are you sure?',
                        icon: "success",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        customClass: {
                            confirmButton: "btn-danger",
                        },
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            saveMessage([0, 0]);
                        } else {
                            return;
                        }
                    });
                } else { // in case of create or save a copy
                    if (role === 0) {
                        saveMessage([1, 999]);
                    } else {
                        const inputOptions = role === 1 ? { "0": "User", "1": "Company"} : { "0": "User", "1": "Company", "2": "INEX" };

                        const { value: option } = await Swal.fire({
                            title: "Select the local storage to save",
                            showCancelButton: true,
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn-danger",
                            },
                            input: "radio",
                            inputOptions,
                            inputValidator: (value) => {
                                if (!value) {
                                    return "You need to choose at least one."
                                }
                            }
                        });

                        if (option) {
                            var range = [1, 999];   // user
                            if (option === "1") range = [1000, 1999];   // Admin
                            if (option === '2') range = [2000, 2999];   // SuperAdmin

                            saveMessage(range);
                        }
                    }
                }
            } catch (error) {
                toastr.error(error.message);
            }
        }

        // Save Or Update
        $("#saveMessage").on("click", function() {
            event.preventDefault();
            beforeSave();
        });

        // Save A Copy
        $('#saveAcopy').on("click", function() {
            event.preventDefault();
            isSaveCopy = true;
            beforeSave();
        });

        $("#createGrid").on("click", function() {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: 'You won"t be able to revert this!',
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Yes, create new one!",
                customClass: {
                    confirmButton: "btn-danger",
                },
            }).then(function(result) {
                if (result.value) {
                    changeMode();
                    makeGrid();
                }
            });
        });

        var makeGrid = function () {
            let mouseIsDown = false;
            let isRightClick = false;

            while (grid.hasChildNodes()) {
                grid.removeChild(grid.lastChild); 
            }

            addBlackRow(40, 0, 'grid');

            // orignal draw in draw-mode
            if (mode == 'edit') {
                for (var row = 0; row < messageData.message.length; row++) {
                    for (var col = 0; col < canvasWidth; col++) {
                        if (messageData.message[row][col]) {
                            $('.pixel_' + row + '_' + col).removeClass('off');
                            $('.pixel_' + row + '_' + col).addClass('on');
                        }
                    }
                }
            }

            // Prevent the context menu from appearing on right-click
            grid.addEventListener('contextmenu', function(event) {
                event.preventDefault();
                paintEraseTiles(event.target, false);
            });

            // Handle left-click and right-click
            grid.addEventListener('mousedown', function(event) {
                event.preventDefault();
                if (event.button === 0) { // Left-click
                    mouseIsDown = true;
                    isRightClick = false;
                    paintEraseTiles(event.target, true);
                } else if (event.button === 2) { // Right-click
                    mouseIsDown = true;
                    isRightClick = true;
                    paintEraseTiles(event.target, false);
                }
            });

            // Handle touchstart
            grid.addEventListener('touchstart', function(event) {
                event.preventDefault();
                mouseIsDown = true;
                paintEraseTiles(event.target, true);
            });

            // Handle mousemove for continuous painting/erasing
            grid.addEventListener('mousemove', function(event) {
                if (mouseIsDown) {
                    event.preventDefault();
                    paintEraseTiles(event.target, !isRightClick);
                }
            });

            // Handle touchmove for continuous painting/erasing
            grid.addEventListener('touchmove', function(event) {
                if (mouseIsDown) {
                    event.preventDefault();
                    paintEraseTiles(event.target, true);
                }
            });

            // Handle mouseup to stop painting/erasing
            document.addEventListener('mouseup', function(event) {
                event.preventDefault();
                mouseIsDown = false;
            });

            // Handle mouseover for continuous painting/erasing
            grid.addEventListener('mouseover', function(event) {
                if (mouseIsDown) {
                    event.preventDefault();
                    paintEraseTiles(event.target, !isRightClick);
                }
            });
        }; 

        makeGrid();

        // paint or erase cells based on the mode (girdTileMode)

        function paintEraseTiles(targetCell, mode) {
            if (targetCell.classList.contains('light')) {
                if($($(targetCell).parent())[0].className == 'disabled') {
                    return;
                }
                // targetCell.style.backgroundColor = gridTileMode === PAINT ? userColor.value : 'transparent';
                if (mode == true) {
                    targetCell.classList.add('on');
                    targetCell.classList.remove('off');
                } else {
                    targetCell.classList.add('off');
                    targetCell.classList.remove('on');
                }
            } else {
                console.log("Nice try: " + targetCell.nodeName + " talk to the hand!");
            }
        }

        $("#inputWidth").on('change', function() {
            $(displayWidth).val($(this).val());
        });
        
        $("#gridWidthDisplay").on('change', function() {
            $("#inputWidth").val($(this).val());
        });
        
        $("#inputHeight").on('change', function() {
            $(displayHeight).val($(this).val());
        });

        $("#gridHeightDisplay").on('change', function() {
            $("#inputHeight").val($(this).val());
        });

        $("#colorPicker").on('change', function() {
            gridTileMode = PAINT;
            tileMode.innerHTML = ' ' + gridTileMode;
        });

        if (document.getElementById('clearGrid') !== null) {
            document.getElementById('clearGrid').addEventListener('click', function() {
                // gridCanvas.classList.toggle('rotateCanvas'); // rotate the Design Canvas div
                let tiles = grid.getElementsByTagName('td');
                // grid.children().children().removeAttr("style");
                for(let i = 0; i <= tiles.length; i++) {
                    if(tiles[i]) {
                        tiles[i].style.backgroundColor = 'transparent';
                    }
                }
            });
        }

        // set the mode to PAINT or ERASE
        $(".btn-mode").on('click', function() {
            $(".btn-mode").each((index, item) => {
                $(item).removeClass('btn-danger');
            })
            $(this).addClass('btn-danger');
        })

        if (document.getElementById('mode') !== null) {
            document.getElementById('mode').addEventListener('click', function(event) {
                gridTileMode = event.target.className.indexOf('paint') >=0 ? PAINT : ERASE;
                tileMode.innerHTML = ' ' + gridTileMode;
            });
        }

        // Alignment

        // the first layer
        $("#alignLeftFirst").on("click", function() {
            event.preventDefault();
            
            document.getElementById("alignLeftFirst").classList.add("bg-dark");
            document.getElementById("alignCenterFirst").classList.remove("bg-dark");
            document.getElementById("alignRightFirst").classList.remove("bg-dark");

            alignments[0] = 0;

            justifyAlignment(0);
        })

        $("#alignCenterFirst").on("click", function() {
            event.preventDefault();
            
            document.getElementById("alignLeftFirst").classList.remove("bg-dark");
            document.getElementById("alignCenterFirst").classList.add("bg-dark");
            document.getElementById("alignRightFirst").classList.remove("bg-dark");

            alignments[0] = 1;
            justifyAlignment(0);
        })

        $("#alignRightFirst").on("click", function() {
            event.preventDefault();
            
            document.getElementById("alignLeftFirst").classList.remove("bg-dark");
            document.getElementById("alignCenterFirst").classList.remove("bg-dark");
            document.getElementById("alignRightFirst").classList.add("bg-dark");

            alignments[0] = 2;
            justifyAlignment(0);
        })

        // the second layer
        $("#alignLeftSecond").on("click", function() {
            event.preventDefault();
            
            document.getElementById("alignLeftSecond").classList.add("bg-dark");
            document.getElementById("alignCenterSecond").classList.remove("bg-dark");
            document.getElementById("alignRightSecond").classList.remove("bg-dark");

            alignments[1] = 0;

            justifyAlignment(1);
        })

        $("#alignCenterSecond").on("click", function() {
            event.preventDefault();
            
            document.getElementById("alignLeftSecond").classList.remove("bg-dark");
            document.getElementById("alignCenterSecond").classList.add("bg-dark");
            document.getElementById("alignRightSecond").classList.remove("bg-dark");

            alignments[1] = 1;
            justifyAlignment(1);
        })

        $("#alignRightSecond").on("click", function() {
            event.preventDefault();
            
            document.getElementById("alignLeftSecond").classList.remove("bg-dark");
            document.getElementById("alignCenterSecond").classList.remove("bg-dark");
            document.getElementById("alignRightSecond").classList.add("bg-dark");

            alignments[1] = 2;
            justifyAlignment(1);
        })

        // the third layer
        $("#alignLeftThird").on("click", function() {
            event.preventDefault();
            
            document.getElementById("alignLeftThird").classList.add("bg-dark");
            document.getElementById("alignCenterThird").classList.remove("bg-dark");
            document.getElementById("alignRightThird").classList.remove("bg-dark");

            alignments[2] = 0;

            justifyAlignment(2);
        })

        $("#alignCenterThird").on("click", function() {
            event.preventDefault();
            
            document.getElementById("alignLeftThird").classList.remove("bg-dark");
            document.getElementById("alignCenterThird").classList.add("bg-dark");
            document.getElementById("alignRightThird").classList.remove("bg-dark");

            alignments[2] = 1;
            justifyAlignment(2);
        })

        $("#alignRightThird").on("click", function() {
            event.preventDefault();
            
            document.getElementById("alignLeftThird").classList.remove("bg-dark");
            document.getElementById("alignCenterThird").classList.remove("bg-dark");
            document.getElementById("alignRightThird").classList.add("bg-dark");

            alignments[2] = 2;
            justifyAlignment(2);
        })

        // Clear Canvas for New button

        var clearMessage = function () {
            if (drawMode == 0) {
                $('.message-input input').each(function() {
                    $(this).val('');
                });
                clearLights('wrapperLed');
                messages = [];
            } else {
                clearLights('pixelCanvas');
            }
        }

        $("#clearMessage").on("click", function () {
            event.preventDefault();

            clearMessage();
        })

        // message name
        let message_name = $('#message_name').val();
        $('#message_name').on('keyup', function(e) {
            message_name = e.target.value;
        });

        // let message_keywords = $('#message_keywords').val().split(' ');
        let message_keywords = $('#message_keywords').val();
        $('#message_keywords').on('keyup', function(e) {
            message_keywords = e.target.value;
        });
        let message_ID = $('#message_ID').val();

        function checkAlphanumeric(message) {
            var pattern = /^[a-zA-Z0-9]+$/;
            return pattern.test(message);
        }
    });
</script>