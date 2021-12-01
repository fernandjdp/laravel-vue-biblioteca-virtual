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
                 @click="search"
                >
                <font-awesome-icon icon="search" />
              </vs-button>
              </vs-col>
            </vs-row>
        </div>

        <div class="card-body">
            <va-form ref="form" type="inline" class="justify-content-between">
                <va-form-item label="Nombre">
                    <va-input v-model="form.nombre" autofocus />
                </va-form-item>
                <va-form-item label="Gerencia">
                    <va-select v-model="form.linea_id" search width="md">
                    </va-select>
                </va-form-item>
                <va-form-item label="Desde">
                    <va-datepicker v-model="form.desde" :autoclose="true" format="dd-MM-yyyy" />
                </va-form-item>
                <va-form-item label="Hasta">
                    <va-datepicker v-model="form.hasta" :autoclose="true" format="dd-MM-yyyy" />
                </va-form-item>
            </va-form> 
        </div>
         </div>
     </div>
</template>

<script>
	export default 
	{
		data () {
		    return {
                form: new Form({
                    area_tematica_id:'',
                    desde:'',
                    hasta:'',
                    linea_id:'',
                    nombre:'',
                }),
		    }
		},

		methods: {
            search(){
                this.llamarAPI({tipo:'post', ruta:'api/buscarTrabajo'})
            }
        }
	}
</script>