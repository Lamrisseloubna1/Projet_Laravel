/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';

const nickname=document.getElementById('nickname');
const message=document.getElementById('message');
const submitButton=document.getElementById('submitButton');
const chatDiv=document.getElementById('chat');

submitButton.addEventListener('click',()=>{
    axios.post('/chat',{
        nickname:nickname.value,
        message:message.value
    });
});
window.Echo.channel('chat')
    .listen('.chat-message',(event)=>{
        chatDiv.innerHTML +=`<div>hiiii ${event.message} </div>`
    });
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// import './components/Example';
