import './jquery.min';
import 'bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import axios from 'axios';
window.axios = axios;
import 'fullcalendar';
import { Calendar } from 'fullcalendar';
import 'owl.carousel';
import './select2.min';
import './schedule';
import '../css/app.css';
import '../sass/app.scss'
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