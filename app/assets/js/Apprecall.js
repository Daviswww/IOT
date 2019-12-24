var j = $.getJSON({url:'./../../config.json', async:false});
var host = j.responseJSON.host;
var talk, sa;
$(function(){
    const btn = document.querySelector('#msg-talk');
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();
    
    recognition.onstart = function(){
        console.log('voice is activated.');
    };

    recognition.onresult = function(event){
        console.log(event);
        
        const current = event.resultIndex;
        const transcript = event.results[current][0].transcript;
        //content.textContent = transcript;
        $.ajax({         
            url: 'http://'+host+':3000/switch',
            cache: false,
            dataType: 'json',
            type:'GET',
            success: function(res) {
                sa = false;
                res.forEach(function(switchs) {
                    if(transcript.match(switchs.typeName) && transcript.match(switchs.name)){
                        if(transcript.match("關")){
                            talk =  'f'+switchs.order;
                        }
                        else if(transcript.match("開")){
                            talk =  'n'+switchs.order;
                        }
                        $.ajax({         
                            url: '../../V2/control/pubControl.php',
                            cache: true,
                            dataType: 'text',
                            type:'POST',
                            data: {
                                msg: talk
                            },
                            success: function(response) {
                                console.log("AC");
                            },
                            error: function(xhr) {
                                console.log("Error");
                            }
                        });
                        sa = true;
                        return true;
                    }
                });
            }
        }).done(function(res){
            console.log('voice is done!');
            document.getElementById('msg-talk').style.backgroundColor = 'black';
        });
        talk="";
        console.log(transcript);
        readOutLoud(transcript);
        
    };

    $('#msg-talk').on('click',function(){
        document.getElementById('msg-talk').style.backgroundColor = 'green';
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