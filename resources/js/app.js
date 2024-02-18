import './bootstrap';
import 'laravel-datatables-vite';

Echo.channel('notifications')
    .listen('.MessageEvent', (e) => {
        console.log(e.message);
    });
