<template>
<div class="container">
    <vs-row align="center" justify="center">
        <vs-col w="12">
       <div class="card border-light shadow rounded-card">
        <div class="card-header">
             <vs-row justify="flex-end">
              <vs-col w=3>
                <h3>Áreas Temáticas</h3>
              </vs-col>
               <vs-col offset="8" w=1>
                <vs-button
                 icon
                 color="rgb(22,212,149)"
                 :active="active == 0"
                 @click="modalCrear"
                >
                <font-awesome-icon icon="plus" />
              </vs-button>
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
                            <vs-th style="width: 55%">
                              Nombre
                            </vs-th>
                            <vs-th style="width: 10%">
                              Carrera
                            </vs-th>
                            <vs-th style="width: 30%">
                              Línea de Investigación
                            </vs-th>
                            <!-- Como es un CRUD básico, no veo razón por la cual tendría más de 5 columnas. De todas formas, NO SE PUEDE ITERAR EL VS-TH debido a que altera la estructura -->
                          </vs-tr>
                         </template>
                         <template #tbody>
                          <vs-tr
                            :key="i"
                            v-for="(tr, i) in areas_tematicas"
                            :data="tr"
                          >
                            <vs-td>
                            {{ tr.id }}
                            </vs-td>
                            <vs-td>
                            {{ tr.nombre }}
                            </vs-td>
                            <vs-td>
                            {{ tr.carrera.nombre }}
                            </vs-td>
                            <vs-td>
                            {{ tr.linea.nombre }}
                            </vs-td>
                            <template #expand>
                              <div class="con-content">       
                                <vs-row align="flex-end" justify="flex-end">  
                                  <vs-col offset="10" w="1">
                                    <vs-button @click="modalEdicion(tr)" flat icon>
                                      Editar
                                    </vs-button>
                                    </vs-col>
                                    <vs-col w="1">
                                    <vs-button @click="deleteArea(tr.id)" border danger>
                                      Eliminar
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
                Edita/actualiza el <b>Área Temática</b>
              </h4>
              <h4 v-else class="not-margin">
                Ingresa una nueva <b>Área Temática</b>
              </h4>
            </template>

              <va-form ref="form" type="vertical">
                <va-form-item label="Nombre" need>
                  <va-input
                    name="Nombre"
                    v-model="form.nombre"
                    placeholder="Nombre del área temática"
                    :rules="[{type:'required', tip:'Este campo es necesario'}]"
                    clearable />
                </va-form-item>
                <va-form-item label="Carrera" need>
                  <va-select
                    search
                    name="Carrera"
                    v-model="form.carrera_id"
                    :options="options"
                    :rules="[{type:'required'}]">
                  </va-select>
                </va-form-item>
                <va-form-item label="Linea de Investigacion" need>
                  <va-select
                    search
                    name="Linea"
                    v-model="form.linea_id"
                    :rules="[{type:'required'}]">
                    <va-option 
                    v-for="(carrera, index) in lineas"
                    :key="index"
                    :value="carrera.id"
                    :label="carrera.nombre"
                    >
                      {{carrera.nombre}}
                    </va-option>
                  </va-select>
                </va-form-item>
              </va-form>

            <template #footer>
              <div class="footer-dialog">
                <vs-button @click="edicion ? updateArea() : createArea()" color="rgb(22,212,149)" block>
                  Crear
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
      active: false, 
      carreras: [],
      lineas:[],
      areas_tematicas:[],
      edicion:false,
      pagina: 1,
      total:0,
      form: new Form({
        id:undefined,
        nombre:'',
        carrera_id:'',
        linea_id:'',
      }),
    }),
    mounted() {
      this.getLinea();
      this.getCarrera();
      this.getAreaTematica();
    },
    created() {
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
          this.getLinea();
          this.getCarrera();
          this.getAreaTematica();
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
          axios.get('/api/areasTematicas?page=' + this.pagina)
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
      },

      /* Un CRUD (Create, Read, Update, Delete) permite, como su nombre en inglés lo indica, crear, leer, actualizar y eliminar información, por lo tanto uso los mismos nombres en inglés para las funciones de tal forma que se mantenga la idea, aún con el "spanglish"*/

      createArea(){
        this.llamarAPI({tipo:'post', ruta:'api/linea'})
        this.active = !this.active;
      },
      getAreaTematica(){
        this.llamarAPI({tipo:'get-paginado', ruta:'api/areasTematicas', variable:'areas_tematicas', variable2:'total'})
      },
      getLinea(){
        this.llamarAPI({tipo:'get', ruta:'api/linea', variable:'lineas'})
      },
      getCarrera(){
        this.llamarAPI({tipo:'get', ruta:'api/carrera', variable:'carreras'})
      },
      updateArea(){
        this.llamarAPI({tipo:'put', ruta:'api/areasTematicas/', id:this.form.id})
        this.form.reset()
        this.active = !this.active;
      },
      deleteArea(id){
        this.llamarAPI({tipo:'delete', ruta:'api/areasTematicas/', id:id})
      },
    },
  }
</script>