<template>
	<div>
		<div v-if="trabajos_carrera.length != 0">
			<!-- Lista de Trabajos -->
			<div class="row justify-content-center text-center">
				<div class="col-auto py-3" v-for="trabajo in trabajosAprobados" :key="trabajo.id" style="max-width: 300px;">
			        <vs-card @click="detallesTrabajo(trabajo)">
					    <template #title>
				            <div class="row justify-content-center text-center">
						        <div class="col-12">
						          <h4 class="not-margin">
						            <b>{{ trabajo.alias }}</b>
						          </h4>         
						        </div>
						        <div class="col-12">
						          <h5 class="card-title text-uppercase text-muted mb-0 text-centered">
						            {{ trabajo.linea.nombre }}
						          </h5>
						        </div>
						     </div>
					    </template>
					    <!--<template #img>
					      <img :src="trabajo.ruta_img"  height="200px" alt="Imagen">
					    </template>-->
					    <template #img>
					      <img src="/img/IsometricLogo.jpeg"  height="200px" alt="Imagen">
					    </template>
					    <template #text>
					      <b>
					        {{ trabajo.descripcion }}
					      </b>
					    </template>
					</vs-card>
				</div>
			</div>
			<!-- /Lista de Trabajos -->
		</div>
		<div v-else class="justify-content-center text-center pt-4 pl-5">
			<vs-alert color="danger">
				<template #title>
				</template>
				<p><b>Upss...</b></p>
				<p>Parece que actualmente no existe ningún trabajo de grado registrado</p>
			</vs-alert>
		</div>
		<div v-if="trabajo" class="modal fade" id="detallesTrabajo" tabindex="-1" role="dialog" aria-labelledby="agregarLabel" aria-hidden="true">
        	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <dialog-detalles-trabajo :trabajo="trabajo"></dialog-detalles-trabajo>
            </div>
        </div>
		<!--<div v-if="dialog">
    		<dialog-detalles-trabajo :carrera_id="carrera_id" :trabajo="trabajo" :flag="!active"></dialog-detalles-trabajo>
    	</div>-->
	</div>
</template>

<script>
	export default 
	{
		name: 'trabajos_especiales',

		props: {
			carrera_id: {
				type: Number,
				required: false
			},
		},

		computed: {
			trabajosAprobados :function () {
				return this.trabajos_carrera.filter(function (trabajo) {
					return trabajo.aprobado != 0 
				})
			}
		},

		data:() => ({
	      trabajo: null,
	      trabajos_carrera:[]
	    }),

	    mounted() {
	    },

	    created() {
	    	this.getTrabajos()
	    },
	    methods: {
	      	detallesTrabajo(trabajo){
	    		this.trabajo = trabajo;
	      		$('#detallesTrabajo').modal('show');
	      	},	
	      	getTrabajos(){
	      		this.llamarAPI({tipo:'get', ruta:'api/trabajo_by_carrera/'+this.carrera_id, variable:'trabajos_carrera'})
	      	},
	      	updateTrabajo(){
	        	this.llamarAPI({tipo:'put', ruta:'api/trabajo/', id:this.form.id})
	        	this.form.reset()
	      	},
	      	deleteTrabajo(id){
	       	 	this.llamarAPI({tipo:'delete', ruta:'api/trabajo/', id:id})
	      	},
	    }
	}
</script>