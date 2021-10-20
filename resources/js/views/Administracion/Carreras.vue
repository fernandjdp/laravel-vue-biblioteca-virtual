<template>
<div class="container">
    <vs-row align="center" justify="center">
        <vs-col w="12">
       <div class="card border-light shadow rounded-card">
        <div class="card-header">
             <vs-row justify="flex-end">
              <vs-col w=3>
                <h3>Carreras</h3>
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
                            <vs-th>
                              ID
                            </vs-th>
                            <vs-th >
                              Nombre
                            </vs-th>
                            <vs-th >
                              Icono
                            </vs-th>
                            <!-- Como es un CRUD básico, no veo razón por la cual tendría más de 5 columnas. De todas formas, NO SE PUEDE ITERAR EL VS-TH debido a que altera la estructura -->
                          </vs-tr>
                         </template>
                         <template #tbody>
                          <vs-tr
                            :key="i"
                            v-for="(tr, i) in carreras"
                            :data="tr"
                          >
                            <vs-td>
                            {{ tr.id }}
                            </vs-td>
                            <vs-td>
                            {{ tr.nombre }}
                            </vs-td>
                            <vs-td v-if="tr.icono">                              
                                <font-awesome-icon :icon="tr.icono" size="2x"  fixed-width></font-awesome-icon>                            
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
                                    <vs-button @click="deleteCarrera(tr.id)" border danger>
                                      Eliminar
                                    </vs-button>
                                  </vs-col>   
                                </vs-row>
                              </div>
                            </template>
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
          <vs-dialog v-model="active">
            <template #header>
              <h4 v-if="edicion"class="not-margin">
                Edita/actualiza la <b>Carrera</b>
              </h4>
              <h4 v-else class="not-margin">
                Ingresa una nueva <b>Carrera</b>
              </h4>
            </template>
            <vs-row justify="center">
              <vs-col w="12">
                <div class="center pt-5 content-inputs">
                  <vs-input
                    type="text"
                    v-model="form.nombre"
                    label="Nombre"
                    placeholder="Ej: Ingeniería Electrónica"
                  />
                </div>            
              </vs-col>
              <vs-col w="12">
                <div class="center pt-5 content-inputs">
                <vs-input
                    @change="preIcono()"
                    type="text"
                    v-model="pre_icono"
                    label="Icono"
                    placeholder="Ej: landmark"
                  />
                </div>
              </vs-col>
              <vs-col w="4">
                <div class="center pt-4 content-inputs">
                  <div class="card" style="height: 100px; border-radius:1em !important;">
                    <div class="card-body shadow" style="background: linear-gradient(87deg, #2dce89 0, #2dcecc 100%) !important;">
                      <vs-row align="center" justify="center">             
                        <font-awesome-icon :icon="form.icono" size="4x"  fixed-width></font-awesome-icon>
                      </vs-row>
                    </div>
                  </div>
                </div>
              </vs-col>
            </vs-row>
              <template #footer>
                <div class="footer-dialog">
                  <vs-button @click="edicion ? updateCarrera() : createCarrera()" color="rgb(22,212,149)" block>
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
      edicion:false,
      carreras: [],
      pre_icono:'',
      form: new Form({
        id:'',
        nombre:'',
        icono:'icons',
      }),
    }),
    mounted() {
      this.getCarrera();
    },
    created() {
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
          this.getCarrera();
      });
    },
    methods: {

      preIcono() {
        const loading = this.$vs.loading()
        setTimeout(() => {
          loading.close()
          this.form.icono = this.pre_icono
        }, 300)
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

      createCarrera(){
        this.llamarAPI({tipo:'post', ruta:'api/carrera'})
      },
      getCarrera(){
        this.llamarAPI({tipo:'get', ruta:'api/carrera', variable:'carreras'})
      },
      updateCarrera(){
        this.llamarAPI({tipo:'put', ruta:'api/carrera/', id:this.form.id})
        this.form.reset()
      },
      deleteCarrera(id){
        this.llamarAPI({tipo:'delete', ruta:'api/carrera/', id:id})
      },
    },
  }
</script>