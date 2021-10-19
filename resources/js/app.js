/**
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
 
import Vue from 'vue'
window.Vue = require('vue').default;

import Vuex from 'vuex'
Vue.use(Vuex)


/* Vue Atlas (Estilo Atlassian) */

import Va from 'vue-atlas'
import 'vue-atlas/dist/vue-atlas.css'

/**
 * Some components are pre-wired for i18n.
 * 'en', 'es' and 'fr' are available at the moment.
 */
Vue.use(Va, 'es')

/* vForm */
import Form from 'vform'
import {
  Button,
  HasError,
  AlertError,
  AlertErrors,
  AlertSuccess
} from 'vform/src/components/bootstrap5'
// 'vform/src/components/bootstrap4'
// 'vform/src/components/tailwind'

Vue.component(Button.name, Button)
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)
window.Form = Form;

/* Vuesax */
import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css' //Vuesax styles
import 'vuesax/dist/base.css'
Vue.use(Vuesax, {
// options here
})

// Funcion para 'capitalizar' un string
Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});

/* Vue-Router */

import VueRouter from 'vue-router'
Vue.use(VueRouter);

/* Información del usuario logueado */

Vue.prototype.$userInfo = document.querySelector("meta[name='user_info']").getAttribute('content');
Vue.prototype.$userType = document.querySelector("meta[name='user_type']").getAttribute('content');

/* LlamarAPI */
// Función para hacer las llamadas al API de forma más elegante

Vue.mixin({
  	methods: {
	    llamarAPI: function({tipo, ruta, variable='',variable2='', info='form', id=''}={}) {
	    	//Funcion para simplificar el uso del axios
	        switch(tipo) {
	          case 'get':
	            axios.get(ruta).then(({ data }) => (this[variable] = data));
	            break;

	           case 'get-paginado':
	            axios.get(ruta).then(response => {
	            	//Variable2 suele ser "total", pero lo pondré opcional por si acaso
	            	console.log(response.data)
	              this[variable] = response.data[0].data;
	              this[variable2] = response.data[1];	
	            });
	            break;

	          case 'post':
	            this[info].post(ruta)
	            .then(()=>{
	              Fire.$emit('recargar');
	            })
	            .catch(()=>{
	            })
	          break;

	          case 'put':
	            this.[info].put(ruta+id)
	            .then(()=>{
	              Fire.$emit('recargar');
	            })
	            .catch(()=>{
	            });
	          break;

	          case 'delete':
	            this.[info].delete(ruta+id)
	            .then(()=>{
	              Fire.$emit('recargar');
	            })
	            .catch(()=>{
	            });
	          break;
	    	}
	    },
	    refrescar(){
	    	this.$router.go();
	    },
  	}
});

import router from './routes'

/* FontAwesome*/
import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'	
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas, fab)
dom.watch() 

Vue.component('font-awesome-icon', FontAwesomeIcon)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Componentes
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('nav-lateral', require('./components/NavsComponent.vue').default);
Vue.component('estadisticas-carrera', require('./components/Biblioteca/EstadisticasComponent.vue').default);
Vue.component('filtro-busqueda', require('./components/Biblioteca/FiltroBusquedaComponent.vue').default);
Vue.component('trabajos-especiales', require('./components/Biblioteca/TrabajosComponent.vue').default);
Vue.component('info', require('./components/Biblioteca/InfoComponent.vue').default);
// /Componentes

// Dialogs
Vue.component('dialog-nuevo-trabajo', require('./components/Dialogs/DialogNuevoTrabajoComponent.vue').default);
Vue.component('dialog-detalles-trabajo', require('./components/Dialogs/DialogDetallesTrabajoComponent.vue').default);
// /Dialogs

// Cards
// /Cards

// Botones
Vue.component('boton-nuevo-trabajo', require('./components/Biblioteca/BotonNuevoTrabajo.vue').default);
// /Botones

window.Fire =  new Vue();


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data () {
    	return {
    		variable_contenedor:[],
    	}
    },
    router,
});
