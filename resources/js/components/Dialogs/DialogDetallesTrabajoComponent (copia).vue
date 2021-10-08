<template>
  <vs-dialog fullScreen v-model="activo">
    <template #header>
      <div class="row justify-content-center text-center">
        <div class="col-12">
          <h4 class="not-margin">
            <b>{{ trabajo.nombre }}</b>
          </h4>         
        </div>
        <div class="col-12">
          <h5 class="card-title text-uppercase text-muted mb-0 text-centered">
            {{ trabajo.rama.nombre }}
          </h5>
        </div>
      </div>
    </template>
    <!-- Columna izquierda -->
    <div class="row pb-3">
      <div class="col-6">
        <div class="container">
          <div class="d-flex align-items-center justify-content-center" id="trabajo-pdf">
            <!-- Contenedor del pdf -->
          </div>
          <div class="center pt-4 content-inputs">
            <vs-input
              type="text"
              v-model="form.nombre"
              label="Nombre"
              placeholder="Ingeniería Electrónica"
            />
          </div> 
        </div>
      </div>
      <!-- Columna derecha -->
      <div class="col-6">
        <div class="container">
          <div class="center pt-4 content-inputs">
            <vs-input
              type="text"
              v-model="form.nombre"
              label="Nombre"
              placeholder="Ingeniería Electrónica"
            />
          </div> 
        </div>
      </div>
    </div>
    <template #footer>
      <div class="footer-dialog">
        <vs-button @click="mostrarPDF()" color="rgb(22,212,149)" block>
          Crear
        </vs-button>
      </div>
    </template>
  </vs-dialog>
</template>

<script>
  import PDFObject from 'pdfobject'
  export default 
  {
    name: 'dialog_detalles_trabajo',

    props: {
      carrera: {
        type: Object,
        required: false
      },
      trabajo: {
        type: Object,
        required: true
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
      form: new Form({
        id:'',
        nombre:''
      }),
    }),

    mounted() {
    },

    created() {
      Fire.$on('recargar',() => {
      });
    },
    methods: {
      mostrarPDF(){
        if (this.trabajo.ruta_pdf && this.activo) {
          let contenedor = document.getElementById('trabajo-pdf');
          PDFObject.embed(this.trabajo.ruta_pdf,contenedor,{height:'20rem', width:'100%'})
        }
      }
    }
  }
</script>