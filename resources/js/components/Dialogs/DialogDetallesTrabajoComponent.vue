<template>
  <div class="modal-content">
    <div class="modal-header text-center justify-content-center">
      <div class="row">
        <div class="col-12">
          <h4 class="not-margin">
            <b>{{ trabajo.nombre }}</b>
          </h4>         
        </div>
        <div class="col-12">
          <h5 class="card-title text-uppercase text-muted mb-0">
            {{ trabajo.linea.nombre }}
          </h5>
        </div>
      </div>
    </div>
    <div class="modal-body">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
          <div class="col-5">
            <va-form ref="form" type="vertical">
              <va-form-item label="Nombre">
                <va-input
                  name="Nombre"
                  disabled
                  v-model="trabajo.nombre"
                  placeholder="Nombre del trabajo de grado"
                  :rules="[{type:'required', tip:'Este campo es necesario'}]"
                  clearable />
              </va-form-item>
              <va-form-item label="Descripcion">
                <va-input
                  name="Descripcion"
                  disabled
                  v-model="trabajo.descripcion"
                  placeholder="Alias que aparecerá como título en la biblioteca"
                  :rules="[{type:'required', tip:'Este campo es necesario'}]"
                  clearable />
              </va-form-item>
              <va-form-item label="Linea de Investigacion">
                <va-input
                  name="Linea"
                  disabled
                  v-model="trabajo.linea.nombre"
                  placeholder="Alias que aparecerá como título en la biblioteca"
                  :rules="[{type:'required', tip:'Este campo es necesario'}]"
                  clearable />
              </va-form-item>
              <va-form-item label="Área Temática">
                <va-input
                  name="Linea"
                  disabled
                  v-model="trabajo.area_tematica.nombre"
                  placeholder="Alias que aparecerá como título en la biblioteca"
                  :rules="[{type:'required', tip:'Este campo es necesario'}]"
                  clearable />
              </va-form-item>
            </va-form>
          </div>
          <div class="col-1 d-flex align-content-between flex-wrap">
            <vs-button
              icon
              circle
              size="xl"
              color="primary"
              :href="'.'+trabajo.ruta_resumen_pdf"
              gradient
            >
              <i class='fa fa-file' ></i>
            </vs-button>
            <vs-button
              icon
              circle
              size="xl"
              :href="'.'+trabajo.ruta_trabajo_pdf"
              color="success"
              gradient
            >
              <i class='fa fa-file-download' ></i>
            </vs-button>
            <vs-button
              icon
              circle
              size="xl"
              color="warn"
              gradient
            >
              <i class='fa fa-copy' ></i>
            </vs-button>
          </div>
          <div class="col-6 justify-content-center text-center pb-5">
            <h2>Autores</h2>
            <div class="card shadow">
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
                            <vs-th style="width: 55%">
                              Nombres
                            </vs-th>
                            <vs-th style="width: 10%">
                              Apellidos
                            </vs-th>
                            <vs-th style="width: 30%">
                              Correo
                            </vs-th>
                            <vs-th style="width: 30%">
                              Contacto
                            </vs-th>
                            <!-- Como es un CRUD básico, no veo razón por la cual tendría más de 5 columnas. De todas formas, NO SE PUEDE ITERAR EL VS-TH debido a que altera la estructura -->
                          </vs-tr>
                         </template>
                         <template #tbody>
                          <vs-tr
                            :key="i"
                            v-for="(tr, i) in trabajo.autores"
                            :data="tr"
                          >
                            <vs-td>
                            {{ tr.name }}
                            </vs-td>
                            <vs-td>
                            {{ tr.last_name }}
                            </vs-td>
                            <vs-td>
                            {{ tr.email }}
                            </vs-td>
                            <vs-td>
                            {{ tr.contacto }}
                            </vs-td>
                          </vs-tr>
                         </template>
                        </vs-table>
                      </div>
                    </vs-col>
                 </vs-row>
              </div>                    
              </vs-col>
            </vs-row>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import PDFObject from 'pdfobject'
  export default 
  {
    name: 'modal_detalles_trabajo',
    props: 
    {
      trabajo: {
        type: Object,
        required: false
      },
    },

    watch: {
      trabajo: {
        handler: function () {
          this.mostrarPDF();
        },
      },
    },

    data:() => 
    ({
       //
    }),

    created() {
      //
    },
    mounted(){
    },
    methods:{
      //
    },
  }
</script>