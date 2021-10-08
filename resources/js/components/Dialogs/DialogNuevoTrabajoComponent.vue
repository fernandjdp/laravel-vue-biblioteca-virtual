<template>
  <vs-dialog v-model="activo">
    <template #header>
      <h4 class="not-margin">
        Registra un nuevo <b>Trabajo Especial de Grado</b>
      </h4>
    </template>
    <vs-row justify="space-between">
      <vs-col w="6">
        <div class="center pt-4 content-inputs">
          <vs-input
            type="text"
            v-model="form.nombre"
            label="Nombre"
            placeholder="Coloque el nombre completo de su trabajo"
          />
        </div> 
      </vs-col>
      <vs-col w="6">
        <div class="center pt-4 content-inputs">
          <vs-input
            type="text"
            v-model="form.alias"
            label="Alias"
            placeholder="Nombre corto y descriptivo"
          />
        </div> 
      </vs-col>
      <vs-col w="12">
        <div class="center pt-4 content-inputs">
          <vs-input
            type="text"
            v-model="form.descripcion"
            label="Descripcion"
            placeholder="Descripcion detallada"
          />
        </div> 
      </vs-col>
      <vs-col w="4">
        <div class="center pt-4 content-inputs">
          <vs-select label="Linea de Investigacion" v-model="form.rama_id">
            <vs-option 
              v-for="linea in carrera.lineas"
              :key="linea.id" 
              :value="linea.id"
              :label="linea.nombre" 
            >
              {{ linea.nombre }}
            </vs-option>
          </vs-select>
        </div> 
      </vs-col>
      <vs-col w="8">
        <div class="center pt-4 content-inputs">
          <vs-input
            @click="imagenInputClick"
            type="text"
            v-model="imagenNombre"
            label="Imagen"
            placeholder=""
          />
          <input
             id="file-input"
             ref="cargarImagen"
             class="d-none"
             type="file"
             accept=".png, .jpg, .jpeg"
             @change="pdfImagenSeleccionada"
          >
        </div> 
      </vs-col>
      <vs-col w="4">
        <div class="center pt-4 content-inputs">
          <vs-select filter multiple collapse-chips label="Autores" v-model="form.autores">
            <vs-option 
              v-for="estudiante in estudiantes"
              :key="estudiante.id" 
              :value="estudiante.id"
              :label="estudiante.name" 
            >
              {{ estudiante.name }}
            </vs-option>
          </vs-select>
        </div> 
      </vs-col>
      <vs-col w="8">
        <div class="center pt-4 content-inputs">
          <vs-input
            @click="pdfInputClick"
            type="text"
            v-model="pdfTrabajoNombre"
            label="PDF del Trabajo de Grado"
            placeholder=""
          />
          <input
             id="file-input"
             ref="cargarTrabajo"
             class="d-none"
             type="file"
             accept=".pdf"
             @change="pdfTrabajoSeleccionado"
          >
        </div> 
      </vs-col>
    </vs-row>
    <template #footer>
      <div class="footer-dialog">
        <vs-button @click="createTrabajo()" color="rgb(22,212,149)" block>
          Crear
        </vs-button>
      </div>
    </template>
  </vs-dialog>
</template>

<script>
  export default 
  {
    name: 'dialog_trabajos_especiales',

    props: {
      carrera_id: {
        type: Number,
        required: false
      },
      flag: {
        type: Boolean,
        required: true
      },
    },

    watch: {
        flag: {
            handler: function () {
              this.activo = !this.activo;
            },
          },
       },

    data:() => ({
      activo:false,
      estudiantes:[],
      carrera:{},
      pdfTrabajoNombre:null,
      imagenNombre:null,
      form: new Form({
        id:'',
        autores:[],
        carrera_id:'',
        descripcion:'',
        nombre:'',
        alias:'',
        rama_id:'',
        ruta_img:'',
        ruta_pdf:'',
      }),
    }),

    mounted() {
      this.setCarreraID()
    },

    created() {
      this.getEstudiantes()
      this.getCarreraEspecifica()
      Fire.$on('recargar',() => {
      });
    },
    methods: {
      pdfInputClick(){
      this.$refs.cargarTrabajo.click()
      },
      imagenInputClick(){
      this.$refs.cargarImagen.click()
      },
      pdfTrabajoSeleccionado(e){
        this.form.ruta_pdf = e.target.files[0];
        this.pdfTrabajoNombre = this.form.ruta_pdf.name
      },
      pdfImagenSeleccionada(e){
        console.log(e.target.files[0])
        this.form.ruta_img = e.target.files[0];
        this.imagenNombre = this.form.ruta_img.name
      },
      createTrabajo(){
        this.llamarAPI({tipo:'post', ruta:'api/trabajo'})
        this.activo = !this.activo
      },
      getEstudiantes(){
        this.llamarAPI({tipo:'get', ruta:'api/users', variable:'estudiantes'})
      },
      getCarreraEspecifica(){
        this.llamarAPI({tipo:'get', ruta:'api/carrera_especifica/'+this.carrera_id, variable:'carrera'})
      },
      setCarreraID(){
        this.form.carrera_id = this.carrera_id
      }
    }
  }
</script>