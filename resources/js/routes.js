import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export default new VueRouter({
	routes: [
		{ path: '/', component: require('./views/ExampleView.vue').default },
	    { path: '/dashboard', component: require('./views/Dashboard.vue').default },

	    //Administracion
	    { path: '/carreras', component: require('./views/Administracion/Carreras.vue').default },
	    { path: '/lineas', component: require('./views/Administracion/Lineas.vue').default },	    
	    { path: '/areas-tematicas', component: require('./views/Administracion/AreasTematicas.vue').default },
	    { path: '/usuarios', component: require('./views/Administracion/Usuarios.vue').default },
	    { path: '/revision', component: require('./views/Administracion/Revision.vue').default },
	    //{ path: '/perfil', component: require('./views/Perfil.vue').default },

	    /* PRUEBA */
	    { path: '/biblioteca/:carrera_id', component: require('./views/Biblioteca/Biblioteca.vue').default },
	    /* PRUEBA */

	    //Ruta de las vistas de las carreras
	    { path: '/derecho', component: require('./views/Biblioteca/Derecho.vue').default },
	    { path: '/ingenieria-electronica', component: require('./views/Biblioteca/Electronica.vue').default },    
	    { path: '/ingenieria-ambiental', component: require('./views/Biblioteca/Ambiental.vue').default },
	    { path: '/procesos-gerenciales', component: require('./views/Biblioteca/Procesos.vue').default },
	    { path: '/turismo', component: require('./views/Biblioteca/Turismo.vue').default },

	    // Nuevo Trabajo de Grado
	    { path: '/nuevo-trabajo', component: require('./views/Biblioteca/NuevoTrabajo.vue').default },

	    //Extras
	    { path: '/iconos', component: require('./views/Extras/Iconos.vue').default },
	],
     mode: 'history',
})