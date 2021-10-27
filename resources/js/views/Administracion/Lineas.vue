<template>
<div class="container">
    <vs-row align="center" justify="center">
        <vs-col w="12">
       <div class="card border-light shadow rounded-card">
        <div class="card-header">
             <vs-row justify="flex-end">
              <vs-col w=3>
                <h3>Lineas de investigación</h3>
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
                            <vs-th style="width: 20%">
                              ID
                            </vs-th>
                            <vs-th style="width: 60%">
                              Nombre
                            </vs-th>
                            <vs-th style="width: 20%">
                              Carrera
                            </vs-th>
                            <!-- Como es un CRUD básico, no veo razón por la cual tendría más de 5 columnas. De todas formas, NO SE PUEDE ITERAR EL VS-TH debido a que altera la estructura -->
                          </vs-tr>
                         </template>
                         <template #tbody>
                          <vs-tr
                            :key="i"
                            v-for="(tr, i) in lineas"
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
                            <template #expand>
                              <div class="con-content">       
                                <vs-row align="flex-end" justify="flex-end">  
                                  <vs-col offset="10" w="1">
                                    <vs-button @click="modalEdicion(tr)" flat icon>
                                      Editar
                                    </vs-button>
                                    </vs-col>
                                    <vs-col w="1">
                                    <vs-button @click="deleteRama(tr.id)" border danger>
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
                Edita/actualiza la <b>Linea</b>
              </h4>
              <h4 v-else class="not-margin">
                Ingresa una nueva <b>Linea</b>
              </h4>
            </template>
            <vs-row class="pt-4" justify="center">
              <vs-col class="px-2" w="6">
                <div class="center content-inputs">
                  <vs-input
                    type="text"
                    v-model="form.nombre"
                    label="Nombre"
                    placeholder="Internet de las Cosas"
                  />
                </div>
              </vs-col>
              <vs-col class="px-2" w="6">
                <div class="center">
                  <vs-select label="Carrera" placeholder="Ingeniería Electrónica" v-model="form.carrera_id" :key="carreras.length">
                    <vs-option 
                      v-for="carrera in carreras"
                      :key="carrera.id" 
                      :value="carrera.id"
                      :label="carrera.nombre" 
                    >
                      {{ carrera.nombre }}
                    </vs-option>
                  </vs-select>
                </div>
              </vs-col>
            </vs-row>
            <template #footer>
              <div class="footer-dialog">
                <vs-button @click="edicion ? updateRama() : createRama()" color="rgb(22,212,149)" block>
                  <h4 class="text-white" v-show="!edicion">Crear</h4><h4 class="text-white" v-show="edicion">Actualizar</h4>
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
      edicion:false,
      pagina:1,
      total:0,
      form: new Form({
        id:undefined,
        nombre:'',
        carrera_id:'',
      }),
      lineas: [],
    }),

    mounted() {
      this.getRama();
      this.getCarrera()
    },

    created() {
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
          this.form.reset()
          this.getRama();
          this.getCarrera()
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
        axios.get('/api/lineas-paginadas?page=' + this.pagina)
          .then(response => {
            this.lineas = response.data[0].data;
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

      createRama(){
        this.llamarAPI({tipo:'post', ruta:'api/linea'})
        this.active = !this.active;
      },
      getRama(){
        this.llamarAPI({tipo:'get-paginado', ruta:'api/lineas-paginadas', variable:'lineas', variable2:'total'})
      },
      getCarrera(){
        this.llamarAPI({tipo:'get', ruta:'api/carrera', variable:'carreras'})
      },
      updateRama(){
        this.llamarAPI({tipo:'put', ruta:'api/linea/', id:this.form.id})
        this.form.reset()
        this.active = !this.active;
        Fire.$emit('recargar');
      },
      deleteRama(id){
        this.llamarAPI({tipo:'delete', ruta:'api/linea/', id:id})
        Fire.$emit('recargar');
      },
    },
  }
</script>