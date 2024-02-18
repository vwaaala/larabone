/**
 * We'll load lodash, jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '4b836378da8b0cfbffb3',
    cluster: 'mt1',
    forceTLS: false,
    wsHost: `api-mt1.pusher.com`,
    wsPort: 80,
    wssPort: 443,
    enabledTransports: ['https'],
});

import { createPopper } from '@popperjs/core';
import jQuery from 'jquery';
import 'bootstrap';
import _ from 'lodash';

try {
    window._ = _;
    window.Popper = createPopper;
    window.$ = window.jQuery = jQuery;
} catch (e) {
    console.error(e);
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */


