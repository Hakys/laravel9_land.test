import 'bootstrap';
import './jquery.min';
import 'owl.carousel';
import './select2.min';

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