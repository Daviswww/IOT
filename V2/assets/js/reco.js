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
    window.location.href = 'https://140.126.21.185/SET/control/pubControl.php?&msg=' + transcript;
    //console.log(transcript);
    readOutLoud(transcript);
};

btn.addEventListener('click', () =>{
    recognition.start();
});

function readOutLoud(message){
    const speech = new SpeechSynthesisUtterance();
    speech.text = message;
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;


}