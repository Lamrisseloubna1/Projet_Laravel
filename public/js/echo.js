// echo.js

import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.PUSHER_APP_KEY, // Assurez-vous que cette clé correspond à celle configurée dans votre .env
    cluster: process.env.PUSHER_APP_CLUSTER, // Assurez-vous que ce cluster correspond à celui configuré dans votre .env
    encrypted: true,
});
