$(function(){
    const btn = document.querySelector('.talk');
    const content = document.querySelector('.content');

    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();

    recognition.onstart = function(){
        console.log('voice is activated.');
    };

    recognition.onresult = function(event){
        console.log(event);
        const current = event.resultIndex;
        const transcript = event.results[current][0].transcript;
        content.textContent = transcript;

        $.ajax({         
            url: '../control/pubControl.php',
            cache: false,
            dataType: 'json',
            type:'POST',
            data: {
                msg: transcript
            },
            error: function(xhr) {
                console.log("recall error");
            },
            success: function(response) {
                console.log('liv:'+response);
            }
        });
        
        //window.location.href = 'https://192.168.1.6/IOT/V2/control/pubControl.php?&msg=' + transcript;
        console.log(transcript);
        readOutLoud(transcript);
    };

    $('#talk').on('click',function(){
        recognition.start();
    });

    function readOutLoud(message){
        const speech = new SpeechSynthesisUtterance();
        speech.text = message;
        speech.volume = 1;
        speech.rate = 1;
        speech.pitch = 1;
    }
});