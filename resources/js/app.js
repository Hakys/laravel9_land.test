import '../css/app.scss';
import './jquery.min';

import 'bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import axios from 'axios';
window.axios = axios;

import 'owl.carousel';
import './select2.min';

function confirmDelete(id) {
    if (confirm("¿Confirma BORRAR el elemento?")) {
      retorno = true;
    } else {
      retorno = false;
    }
    //document.getElementById(id).innerHTML = txt;
    return retorno;
  }
/*
  const sass = require('sass');

  const result = sass.renderSync({
    silenceDeprecations: ['legacy-js-api'],
    ...
  });
*/
