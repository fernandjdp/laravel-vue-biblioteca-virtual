<template>
	<div class="py-4 px-5 mx-4">
		<div class="row justify-content-center">
			<div class="col-3">
				<vs-card type="4">
				    <template #title>
				      <h3>Sabías que?</h3>
				    </template>
				    <template #img>
				      <img src="/swipe/assets/img/illustrations/scene-3.svg" alt="">
				    </template>
				    <template #text>
				      <h6>
				        Puedes obtener un extracto bibliográfico del trabajo de grado con un solo click
				      </h6>
				      Presiona aqui para más informacion
				    </template>
				</vs-card>
			</div>
			<div class="col-3">
				<vs-card type="4">
				    <template #title>
				      <h3>Sabías que?</h3>
				    </template>
				    <template #img>
				      <img src="/swipe/assets/img/illustrations/scene-4.jpg" style="width: 115%; height: auto;" alt="">
				    </template>
				    <template #text>
				      <h6>
				        Puedes obtener un extracto bibliográfico del trabajo de grado con un solo click
				      </h6>
				      Presiona aqui para más informacion
				    </template>
				</vs-card>
			</div>
			<div class="col-3">
				<vs-card type="4">
				    <template #title>
				      <h3>Sabías que?</h3>
				    </template>
				    <template #img>
				      <img src="/swipe/assets/img/illustrations/scene-5.jpg" style="width: 115%; height: auto;" alt="">
				    </template>
				    <template #text>
				      <h6>
				        Puedes obtener un extracto bibliográfico del trabajo de grado con un solo click
				      </h6>
				      Presiona aqui para más informacion
				    </template>
				</vs-card>
			</div>
			<div class="col-3">
				<vs-card type="4">
				    <template #title>
				      <h3>Sabías que?</h3>
				    </template>
				    <template #img>
				      <img src="/swipe/assets/img/illustrations/scene-6.jpg" style="width: 115%; height: auto;" alt="">
				    </template>
				    <template #text>
				      <h6>
				        Puedes seguirnos en las redes sociales
				      </h6>
				      Presiona aqui para más informacion
				    </template>
				</vs-card>
			</div>
		</div>
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
    	}),

	    mounted() {
	      //
	    },

	    created() {
	    	//
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