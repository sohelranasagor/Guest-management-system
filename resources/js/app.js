import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Swal from 'sweetalert2';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const Swal = require('sweetalert2');
