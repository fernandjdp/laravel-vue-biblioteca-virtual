<template>
    <div class="col-10">
		<div class="card border-light shadow rounded-card">
        <div class="card-header">
             <vs-row justify="flex-end">
              <vs-col w=3>
                <h3>Filtro de Busqueda</h3>
              </vs-col>
               <vs-col offset="8" w=1>
                <vs-button
                 icon
                 color="rgb(22,212,149)"
                 :active="active == 0"
                 @click=""
                >
                <font-awesome-icon icon="plus" />
              </vs-button>
              </vs-col>
            </vs-row>
        </div>
        <div class="card-body">
        </div>
         </div>
     </div>
</template>

<script>
	export default 
	{
		data () {
		    return {
          active: 0,
		      elevation: 3,
		      padding: 10
		    }
		},
		props: {
			prop1: {
				type: String,
				required: false
			},
		},

		methods: {
      //
    }
	}
</script>