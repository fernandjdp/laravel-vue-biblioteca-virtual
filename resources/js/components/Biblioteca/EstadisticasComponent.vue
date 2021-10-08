<template>
	<div>
		<!-- Las estadísticas serán pequeñas "cards" que muestran.... pues... estadísticas. Pero además permitirán realizar acciones básicas o activarán diálogos para mejor visualización de la información -->
		<div class="row justify-content-center">
			<div class="col-auto py-3" v-for="(estadisticas, index) in etiquetas_estadisticas" :key="estadisticas.id" style="max-width: 300px;">
				<vs-card @click="cardClick(index)" type="3">
			    <template #title>
			      <h1 class="font-weight-bold mb-0 text-centered">1000%</h1>
			    </template>
			    <template #img>
			      	<img src="/img/estadistica1.png" alt="">
			    </template>
			    <template #text>
			      <p class="card-title text-uppercase text-muted text-centered">
			        {{ estadisticas }}
			      </p>
			    </template>
			  </vs-card>
			</div>
		</div>
		<!-- Dialogs Estadistica -->
    	<div v-if="dialog == 0">
    		<dialog-nuevo-trabajo :carrera_id="carrera_id" :flag="!active"></dialog-nuevo-trabajo>
    	</div>
  	</vs-dialog>
		<!-- /Dialogs Estadistica --> 
	</div>
</template>

<script>
	export default 
	{
		props: {
			carrera_id: {
				type: Number,
				required: false
			},
		},

		data:() => ({
      active: false,
      dialog: null, 
      edicion:false,
      estadisticas:[],
      etiquetas_estadisticas: [
      	'Trabajos',
      	'Descargados',
      	'Visitados',
      	'Referenciados'
      ]
    }),

    mounted() {
      //this.getEstadistica();
    },

    created() {
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
          //this.getEstadistica();
      });
    },
    methods: {
    	cardClick(index){
    		this.active = !this.active;
    		this.dialog = index;
    	},
	    getEstadistica(){
        this.llamarAPI({tipo:'get', ruta:'api/estadistica', variable:'estadisticas'})
      },
    }
	}
</script>