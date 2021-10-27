<template>
  <div class="container">
      <vs-row align="center" justify="center">
          <vs-col w="12">
         <div class="card border-light shadow rounded-card">
          <div class="card-header">
               <vs-row justify="flex-end">
                <vs-col w=12>
                  <h3>Nuevo trabajo especial de grado</h3>
                </vs-col>
              </vs-row>
          </div>
          <div class="card-body">
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
                  <va-input
                    name="Descripcion"
                    v-model="form.descripcion"
                    placeholder=""
                    :rules="[{type:'required', tip:'Este campo es necesario'}]"
                    clearable />
                </va-form-item>
                <va-form-item label="Resumen del trabajo de grado" need>
                  <va-input
                    name="Resumen"
                    v-model="pdfResumenNombre"
                    disabled
                    placeholder="Haga click en la carpeta a la derecha para seleccionar"
                    :rules="[{type:'required', tip:'Este campo es necesario'}]"
                    />
                    <va-button @click="clickSeleccionarResumen" type="subtle"><va-icon type="folder-open" /></va-button>
                </va-form-item>
                <va-form-item label="Trabajo de grado" need>
                  <va-input
                    name="Trabajo"
                    v-model="pdfTrabajoNombre"
                    disabled
                    placeholder="Haga click en la carpeta a la derecha para seleccionar"
                    :rules="[{type:'required', tip:'Este campo es necesario'}]"
                    />
                <va-button @click="clickSeleccionarTrabajo" type="subtle"><va-icon type="folder-open"/></va-button>
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
                        v-model="form.area_tematica_id"
                        :options="areas_tematicas"
                        :rules="[{type:'required'}]">
                      </va-select>
                    </va-form-item>
                    <va-form-item label="Autores" need>
                      <va-select
                        search
                        multiple
                        name="Carrera"
                        limit="5"
                        v-model="form.autores"
                        :options="estudiantes"
                        :rules="[{type:'required'}]">
                      </va-select>
                    </va-form-item>
                  </va-form>
              </div>
            </div>
          </div>
          <div class="card-footer justify-content-right">
            <button @click="crearNuevoTrabajo()" class="btn btn-primary">
              Crear
            </button>
            <button @click="regresar" class="btn btn-secondary">
              Regresar
            </button>
          </div>
        </div>
      </vs-col>
    </vs-row>
    <!-- INPUTS DE RUTAS DE LOS PDF -->
    <div>
    <!-- Ruta del resumen -->
      <input
        id="file-input"
        ref="cargarResumen"
        class="d-none"
        type="file"
        accept=".pdf"
        @change="pdfResumenSeleccionado"
        >
    <!-- Ruta del trabajo -->
        <input
        id="file-input"
        ref="cargarTrabajo"
        class="d-none"
        type="file"
        accept=".pdf"
        @change="pdfTrabajoSeleccionado"
        >
    </div>

    <!-- LOADING -->
    <va-loading v-if="cargando" size="lg" color="blue" center></va-loading>

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
      cargando:false,
      pdfTrabajoNombre: '',
      pdfResumenNombre:'',
      form: new Form({
        id:undefined,
        alias:'',
        area_tematica_id:'',
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
      this.getInfoSelectEstudiantes()
      this.getInfoSelectCarreras()
      this.getInfoSelectLineas()
      this.getInfoSelectAreasTematicas()
    },
    created() {
      //
    },

    watch: {
      //
       },

    methods: {

      crearNuevoTrabajo(){
        this.cargando = !this.cargando
        this.llamarAPI({tipo:'post', ruta:'api/trabajo'})
        this.cargando = !this.cargando
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
        console.log(this.pdfResumenNombre)
      },
      pdfTrabajoSeleccionado(e){
        this.form.ruta_trabajo_pdf = e.target.files[0];
        this.pdfTrabajoNombre = this.form.ruta_trabajo_pdf.name
        console.log(this.pdfTrabajoNombre)
      },
      regresar(){
        this.$router.go(-1);
      }
    },
  }
</script>