import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import Swal from 'sweetalert2';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const Swal = require('sweetalert2');