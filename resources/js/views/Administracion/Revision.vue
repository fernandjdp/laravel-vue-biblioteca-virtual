<template>
<div class="container">
    <vs-row align="center" justify="center">
        <vs-col w="12">
       <div class="card border-light shadow rounded-card">
        <div class="card-header">
             <vs-row justify="flex-end">
              <vs-col w=4>
                <h3>Revisión - Trabajos Especiales de Grado</h3>
              </vs-col>
            </vs-row>
        </div>
        <div class="card-body">
            <vs-row justify="space-between">
              <vs-col w="12">
              <div class="center grid">
                 <vs-row>
                    <vs-col vs-type="flex" vs-justify="center" vs-align="center" w="12">
                      <div class="center">
                        <vs-table>
                         <template #thead>
                          <vs-tr>
                            <vs-th style="width: 5%">
                              ID
                            </vs-th>
                            <vs-th style="width: 35%">
                              Nombre
                            </vs-th>
                            <vs-th style="width: 20%">
                              Alias
                            </vs-th>
                            <vs-th style="width: 10%">
                              Carrera
                            </vs-th>
                            <vs-th style="width: 30%">
                              Descripcion
                            </vs-th>
                            <vs-th style="width: 30%">
                              Aprobado
                            </vs-th>
                            <!-- Como es un CRUD básico, no veo razón por la cual tendría más de 5 columnas. De todas formas, NO SE PUEDE ITERAR EL VS-TH debido a que altera la estructura -->
                          </vs-tr>
                         </template>
                         <template #tbody>
                          <vs-tr
                            :key="i"
                            v-for="(tr, i) in trabajos"
                            :data="tr"
                          >
                            <vs-td>
                            {{ tr.id }}
                            </vs-td>
                            <vs-td>
                            {{ tr.nombre }}
                            </vs-td>
                            <vs-td>
                            {{ tr.alias }}
                            </vs-td>
                            <vs-td>
                            {{ tr.carrera.nombre }}
                            </vs-td>
                            <vs-td>
                            {{ tr.descripcion }}
                            </vs-td>
                            <vs-td>
                              <va-lozenge v-show="tr.aprobado" type="success">Aprobado</va-lozenge>
                              <va-lozenge v-show="!tr.aprobado" type="help">En espera</va-lozenge>
                            </vs-td>
                            <template #expand>
                              <div class="con-content">       
                                <vs-row align="flex-end" justify="flex-end">  
                                  <vs-col offset="9" w="1">
                                    <vs-button @click="modalEdicion(tr)" flat icon>
                                      Editar
                                    </vs-button>
                                    </vs-col>
                                    <vs-col v-if="!tr.aprobado" w="1">
                                    <vs-button @click="deleteTrabajo(tr.id)" border danger>
                                      Eliminar
                                    </vs-button>
                                  </vs-col>  
                                  <vs-col v-if="!tr.aprobado" w="1">
                                    <vs-button @click="aprobarTrabajo(tr.id)" border success>
                                      Aprobar
                                    </vs-button>
                                  </vs-col>   
                                </vs-row>
                              </div>
                            </template>
                          </vs-tr>
                         </template>
                        </vs-table>
                        <div class="center">
                          <vs-pagination v-model="pagina" infinite :length="total" />
                        </div>
                      </div>
                    </vs-col>
                 </vs-row>
              </div>                    
              </vs-col>
            </vs-row>
        </div>
          <vs-dialog v-model="active">
            <template #header>
              <h4 v-if="edicion"class="not-margin">
                Edita/actualiza el <b>Trabajo Especial de Grado</b>
              </h4>
            </template>

              <div class="row">
              <div class="col-6">
                <va-form ref="form" type="vertical">
                  <va-form-item label="Nombre" need>
                    <va-input
                      name="Nombre"
                      v-model="form.nombre"
                      placeholder="Nombre del trabajo de grado"
                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
                      clearable />
                  </va-form-item>
                  <va-form-item label="Alias" need>
                    <va-input
                      name="Alias"
                      v-model="form.alias"
                      placeholder="Alias que aparecerá como título en la biblioteca"
                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
                      clearable />
                  </va-form-item>
                  <va-form-item label="Carrera" need>
                    <va-select
                      search
                      name="Carrera"
                      v-model="form.carrera_id"
                      :options="carreras"
                      :rules="[{type:'required'}]">
                    </va-select>
                  </va-form-item>
                </va-form>        
              </div>
              <div class="col-6">
                <va-form ref="form" type="vertical">
                <va-form-item label="Descripcion" need>
                  <va-textarea 
                  v-model="form.descripcion"
                  :resize="true"
                  minHeight="180px">
                  </va-textarea>
                </va-form-item>
              </va-form>
              </div>
              <div class="col-12">
                <va-form ref="form" type="vertical">
                  <va-form-item label="Linea de Investigacion" need>
                      <va-select
                        search
                        name="Linea"
                        v-model="form.linea_id"
                        :options="lineas"
                        :rules="[{type:'required'}]">
                      </va-select>
                    </va-form-item>
                    <va-form-item label="Área Temática" need>
                      <va-select
                        search
                        name="AreaTematica"
                        v-model="form.areaTematica_id"
                        :options="areas_tematicas"
                        :rules="[{type:'required'}]">
                      </va-select>
                    </va-form-item>
                    <va-form-item label="Autores" need>
                      <va-select
                        search
                        multiple
                        name="Autores"
                        v-model="form.autores"
                        :options="estudiantes"
                        :rules="[{type:'required'}]">
                      </va-select>
                    </va-form-item>
                  </va-form>
              </div>
            </div>

            <template #footer>
              <div class="footer-dialog">
                <div class="row">
                  <div class="col-6">
                    <vs-button @click="edicion ? updateArea() : createArea()" :href="'.'+form.ruta_resumen_pdf" blank primary block>
                      <h4 class="text-white">Mostrar Resumen</h4>
                    </vs-button>
                  </div>
                  <div class="col-6">
                    <vs-button @click="edicion ? updateArea() : createArea()" :href="'.'+form.ruta_trabajo_pdf" blank warn block>
                      <h4>Mostrar Trabajo de grado</h4>
                    </vs-button>
                  </div>
                </div>
                <vs-button @click="edicion ? updateArea() : createArea()" color="rgb(22,212,149)" block>
                  <h4 class="text-white" v-show="!edicion"><CENTER></CENTER>rear</h4><h4 class="text-white" v-show="edicion">Actualizar</h4>
                </vs-button>
              </div>
            </template>
          </vs-dialog>
         </div>
        </vs-col>
      </vs-row>
  </div>
</template>

<script>
  export default 
  {
    data:() => ({
      areas_tematicas:[],
      carreras:[],
      estudiantes:[],
      lineas:[],
      pdfTrabajoNombre: '',
      pdfResumenNombre:'',
      active: false, 
      trabajos:[],
      edicion:false,
      pagina: 1,
      total:0,
      form: new Form({
        id:undefined,
        alias:'',
        areaTematica_id:'',
        autores:[],
        carrera_id:'',
        descripcion:'',
        linea_id:'',
        nombre:'',
        ruta_resumen_pdf:'',
        ruta_trabajo_pdf:'',
      }),
    }),
    mounted() {
      this.getTrabajosPaginados();
      this.getInfoSelectEstudiantes()
      this.getInfoSelectCarreras()
      this.getInfoSelectLineas()
      this.getInfoSelectAreasTematicas()
    },
    created() {
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
          this.getTrabajosPaginados();
      });
    },

    watch: {
        pagina: {
            handler: function () {
              this.paginacion()
            },
          },
       },

    methods: {
      paginacion() {
        axios.get('/api/trabajos-paginados?page=' + this.pagina)
        .then(response => {
          this.areas_tematicas = response.data[0].data;
        });
      }, 
      modalCrear(){
        this.edicion = false
        this.active = !this.active
      },
    
      modalEdicion(info){
        this.edicion = true
        this.active = !this.active
        this.form.fill(info)

        this.form.autores = this.form.autores.map(item => {
          const container = item.id;

          return container;
        }) 
      },
      deleteTrabajo(id){
        this.llamarAPI({tipo:'delete', ruta:'api/trabajo/', id:id})
      },
      aprobarTrabajo(id){
        this.llamarAPI({tipo:'put', ruta:'api/aprobar/', id:id})
      },
      crearNuevoTrabajo(){
        this.llamarAPI({tipo:'post', ruta:'api/trabajo'})
      },
      getTrabajosPaginados(){
        this.llamarAPI({tipo:'get-paginado', ruta:'api/trabajos-paginados', variable:'trabajos', variable2:'total'})
      },
      getInfoSelectAreasTematicas(){
        this.llamarAPI({tipo:'get', ruta:'api/index_areas_tematicas_formateados', variable:'areas_tematicas'})
      },
      getInfoSelectCarreras(){
        this.llamarAPI({tipo:'get', ruta:'api/index_carreras_formateados', variable:'carreras'})
      },
      getInfoSelectEstudiantes(){
        this.llamarAPI({tipo:'get', ruta:'api/index_estudiantes_formateados', variable:'estudiantes'})
      },
      getInfoSelectLineas(){
        this.llamarAPI({tipo:'get', ruta:'api/index_lineas_formateados', variable:'lineas'})
      },
      clickSeleccionarResumen(){
      this.$refs.cargarResumen.click()
      },
      clickSeleccionarTrabajo(){
      this.$refs.cargarTrabajo.click()
      },
      pdfResumenSeleccionado(e){
        this.form.ruta_resumen_pdf = e.target.files[0];
        this.pdfResumenNombre = this.form.ruta_resumen_pdf.name
      },
      pdfTrabajoSeleccionado(e){
        this.form.ruta_trabajo_pdf = e.target.files[0];
        this.pdfTrabajoNombre = this.form.ruta_trabajo_pdf.name
      },
      regresar(){
        this.$router.go(-1);
      }
    },
  }
</script>