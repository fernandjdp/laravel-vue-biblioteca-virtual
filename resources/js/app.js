/**
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
 
import Vue from 'vue'
window.Vue = require('vue').default;

import Vuex from 'vuex'
Vue.use(Vuex)

/* Sweet Alert 2*/
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

/* Rutas */

import router from './routes'

/* Store del vuex */

const store = new Vuex.Store({
  state: {

  },
  mutations: {

  },
  actions: {

  },
  getters: {

  }
})

import { sync } from 'vuex-router-sync'

sync(store, router);

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

Vue.prototype.$userInfo = JSON.parse(document.querySelector("meta[name='user_info']").content);
Vue.prototype.$userType = document.querySelector("meta[name='user_type']").getAttribute('content');

/* LlamarAPI */
// Función para hacer las llamadas al API de forma más elegante

Vue.mixin({
  	methods: {
	    llamarAPI: function({tipo, ruta, variable='',variable2='', info='form', id=''}={}) {
	    	//Funcion para simplificar el uso del axios
	        switch(tipo) {

	        /* Obtener informacion*/
	          case 'get':
	            axios.get(ruta).then(({ data }) => (this[variable] = data));
	            break;

	        /* Obtener informacion Paginada*/
	           case 'get-paginado':
	            axios.get(ruta).then(response => {
	            	//Variable2 suele ser "total", pero lo pondré opcional por si acaso
	              this[variable] = response.data[0].data;
	              this[variable2] = response.data[1];	
	            });
	            break;

	        /* Crear nueva información */
	          case 'post':
	            this[info].post(ruta)
	            .then(()=>{
	            	this.$swal(
			            'Listo',
			            'La informacion ha sido creada exitosamente',
			            'success'
			        )
	              Fire.$emit('recargar');
	            })
	            .catch(()=>{
	            	this.$swal(
		              'Error!',
		              'No se pudo realizar esta accion',
		              'error'
		        	)
	            })
	          break;

	        /* Editar/Actualizar información */
	          case 'put':
	            this[info].put(ruta+id)
	            .then(()=>{
	            	this.$swal(
			            'Listo',
			            'La informacion ha sido actualizada/editada exitosamente',
			            'success'
			        )
	              	Fire.$emit('recargar');
	            })
	            .catch(()=>{
	            	this.$swal(
		              'Error!',
		              'No se pudo realizar esta accion',
		              'error'
		        	)
	            });
	          break;

	        /* Eliminar información */
	          case 'delete':
	          // Inicia el swal para mostrar la alerta
	          this.$swal({
		          title: '¿Estas seguro/a?',
		          text: "¡No podrás revertir esto!",
		          icon: 'warning',
		          showCancelButton: true,
		          confirmButtonColor: '#3085d6',
		          cancelButtonColor: '#d33',
		          confirmButtonText: 'Si, elimínalo'
		        }).then((result) => {
		        	// Si responde SI
		          if (result.isConfirmed) {
		          	//Envía la solicitud para borrar
		            this[info].delete(ruta+id)
			            .then(()=>{
			            	//Muestra una alerta de que se eliminó exitosamente
			              	this.$swal(
				              'Eliminado!',
				              'La informacion ha sido eliminada exitosamente',
				              'success'
			              	)
			            	Fire.$emit('recargar');
		            	})
		            	.catch(()=>{
		            		//Si no se eliminó muestra el error
		            		this.$swal(
				              'Error!',
				              'No se pudo realizar esta accion',
				              'error'
			            	)
		            	});
		          	}
		        })
	          break;
	    	}
	    },
	    refrescar(){
	    	this.$router.go();
	    },
  	}
});

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
    store,
});
