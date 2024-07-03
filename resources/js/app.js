//import 'bootstrap';

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import './schedule';

/*import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;


import 'owl.carousel';
import './select2.min';

import '../css/app.css';

import '@fortawesome/fontawesome-free/scss/fontawesome.scss';
import '@fortawesome/fontawesome-free/scss/brands.scss';
import '@fortawesome/fontawesome-free/scss/regular.scss';
import '@fortawesome/fontawesome-free/scss/solid.scss';
import '@fortawesome/fontawesome-free/scss/v4-shims.scss';

function confirmDelete(id) {
    if (confirm("¿Confirma BORRAR el elemento?")) {
      retorno = true;
    } else {
      retorno = false;
    }
    //document.getElementById(id).innerHTML = txt;
    return retorno;
  }
*/