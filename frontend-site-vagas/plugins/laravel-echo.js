// plugins/laravel-echo.js

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

export default async ({ app }) => {
  if (process.client) {
    window.Echo = new Echo({
      broadcaster: 'pusher',
      key: 'goodfonyerv', // Use as variáveis de ambiente do seu Laravel
      cluster: 'mt1', // Use as variáveis de ambiente do seu Laravel
      forceTLS:true
    });
  }
};
