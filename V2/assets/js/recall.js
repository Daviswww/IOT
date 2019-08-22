$(function(){
    const btn = document.querySelector('#msg-talk');
    const content = document.querySelector('#bot-user');

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
        document.getElementById('bot-user').innerHTML = 'User: '+transcript;
        $.ajax({         
            url: '../control/pubControl.php',
            cache: false,
            dataType: 'json',
            type:'POST',
            data: {
                msg: transcript
            },
            success: function(response) {
                document.getElementById('bot-pc').innerHTML = 'Alice: 接收到命令!';
                console.log('liv:'+response);
            },
            error: function(xhr) {
                document.getElementById('bot-pc').innerHTML = 'Alice: 請再說一遍';
                console.log("recall error");
            }
        });
        
        //window.location.href = 'https://192.168.1.6/IOT/V2/control/pubControl.php?&msg=' + transcript;
        console.log(transcript);
        readOutLoud(transcript);
    };

    $('#msg-talk').on('click',function(){
        document.getElementById('bot-pc').innerHTML = 'Alice: 讀取中...';
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