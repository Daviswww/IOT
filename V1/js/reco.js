const btn = document.querySelector('.talk');
const content = document.querySelector('.content');

const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const recognition = new SpeechRecognition();

recognition.onstart = function(){
    console.log('voice is activated.');
};

recognition.onresult = function(event){
    console.log(event);
};

btn.addEventListener('click', () =>{
    recognition.start();
});