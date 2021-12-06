<template>
    <div class="col-10">
		<div class="card border-light shadow rounded-card">
            <div class="card-header">
                 <vs-row justify="space-between" align="center">
                      <vs-col w=3>
                        <h3>Filtro de Busqueda</h3>
                      </vs-col>
                      <vs-col w=1>
                        <vs-button
                         icon
                         color="rgb(22,212,149)"
                         @click="search"
                        >
                        <font-awesome-icon icon="search" @click="search" />
                        </vs-button> 
                    </vs-col>
                </vs-row>
            </div>

            <div class="card-body">
                <vs-row justify="space-between" align="center">
                    <vs-col w=12>
                        <va-form ref="form" type="inline" class="justify-content-between">
                            <va-form-item label="Nombre">
                                <va-input 
                                v-model="form.nombre" 
                                autofocus 
                                />
                            </va-form-item>
                            <va-form-item label="Linea de Investigacion">
                                <va-select 
                                v-model="form.linea_id" 
                                :options="filtrarLineasPorCarreras" 
                                search 
                                width="md">
                                </va-select>
                            </va-form-item>
                            <va-form-item label="Area de Investigacion">
                                <va-select 
                                v-model="form.area_tematica_id"
                                :options="filtrarAreasPorLineas"
                                search 
                                width="md">
                                </va-select>
                            </va-form-item>
                            <va-form-item label="Desde">
                                <va-datepicker 
                                v-model="form.desde" 
                                :autoclose="true" 
                                format="dd-MM-yyyy" 
                                />
                            </va-form-item>
                            <va-form-item label="Hasta">
                                <va-datepicker 
                                v-model="form.hasta" 
                                :autoclose="true" 
                                format="dd-MM-yyyy" 
                                />
                            </va-form-item>
                        </va-form>
                    </vs-col>
                </vs-row>
            </div>
         </div>
     </div>
</template>

<script>
	export default 
	{
		data () {
		    return {
                areas_tematicas:[],
                lineas:[],

                form: new Form({
                    area_tematica_id:'',
                    carrera_id: this.$store.state.route.params.carrera_id,
                    desde:'',
                    hasta:'',
                    linea_id:'',
                    nombre:'',
                }),
		    }
		},

        mounted(){
            this.loadInfo();
        },

        computed:{
            // Busco filtrar las lineas por carreras en la vista en vez de filtrarlas desde el controlador
          filtrarLineasPorCarreras: function(){
            return this.lineas.filter(linea => (linea.carrera_id==this.form.carrera_id))
          },

          filtrarAreasPorLineas: function(){
            return this.areas_tematicas.filter(area => (area.linea_id==this.form.linea_id))
          },
        },

		methods: {

            loadInfo()
            {
                this.getInfoSelectLineas()
                this.getInfoSelectAreasTematicas()
            },

            getInfoSelectAreasTematicas(){
                this.llamarAPI({tipo:'get', ruta:'api/index_areas_tematicas_formateados', variable:'areas_tematicas'})
            },
            getInfoSelectLineas(){
                this.llamarAPI({tipo:'get', ruta:'api/index_lineas_formateados', variable:'lineas'})
            },

            search(){
                this.form.post('api/buscarTrabajo')
                .then((data)=>{
                  Fire.$emit('filtroBusqueda', data)
                })
                .catch(()=>{
                    console.log("error")
                })
            }
        }
	}
</script>