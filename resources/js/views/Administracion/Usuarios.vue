<template>
<div class="container">
    <vs-row align="center" justify="center">
        <vs-col w="12">
       <div class="card border-light shadow rounded-card">
        <div class="card-header">
             <vs-row justify="flex-end">
              <vs-col w=3>
                <h3>Usuarios</h3>
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
                            <vs-th style="width: 30%">
                              Nombre
                            </vs-th>
                            <vs-th style="width: 20%">
                              Apellido
                            </vs-th>
                            <vs-th style="width: 30%">
                              Cédula
                            </vs-th>
                            <vs-th style="width: 30%">
                              Tipo de Usuario
                            </vs-th>
                            <!-- Como es un CRUD básico, no veo razón por la cual tendría más de 5 columnas. De todas formas, NO SE PUEDE ITERAR EL VS-TH debido a que altera la estructura -->
                          </vs-tr>
                         </template>
                         <template #tbody>
                          <vs-tr
                            :key="i"
                            v-for="(tr, i) in usuarios"
                            :data="tr"
                          >
                            <vs-td>
                            {{ tr.id }}
                            </vs-td>
                            <vs-td>
                            {{ tr.name }}
                            </vs-td>
                            <vs-td>
                            {{ tr.last_name }}
                            </vs-td>
                            <vs-td>
                            {{ tr.cedula }}
                            </vs-td>
                            <vs-td>
                            {{ tr.tipo.nombre }}
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
                                    <vs-button @click="deleteUsuario(tr.id)" border danger>
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
                Edita/actualiza el <b>Usuario</b>
              </h4>
              <h4 v-else class="not-margin">
                Ingresa un nuevo <b>Usuario</b>
              </h4>
            </template>

            <div class="row">
              <div class="col-6">
                <va-form ref="form" type="vertical">
                  <va-form-item label="Nombre" need>
                    <va-input
                      name="Nombre"
                      v-model="form.name"
                      placeholder="Primer y segundo nombre"
                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
                      clearable />
                  </va-form-item>
                  <va-form-item label="Apellido" need>
                    <va-input
                      name="Apellido"
                      v-model="form.last_name"
                      placeholder="Primer y segundo apellido"
                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
                      clearable />
                  </va-form-item>
                </va-form>
              </div>
              <div class="col-6">
                <va-form ref="form" type="vertical">
                  <va-form-item label="Cedula" need>
                    <va-input
                      name="Cedula"
                      v-model="form.cedula"
                      placeholder=""
                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
                      clearable />
                  </va-form-item>
                  <va-form-item label="Tipo de Usuario" need>
                    <va-select
                      name="tipo_usuario"
                      v-model="form.tipo_usuario_id"
                      :options="tipos_usuario"
                      :rules="[{type:'required'}]">
                    </va-select>
                  </va-form-item>
                  <va-form-item label="Acepta los Términos y Condiciones" need>
                   <va-checkbox v-model="form.confirmacion_terminos_condiciones"></va-checkbox>
                  </va-form-item>
                </va-form>
              </div>
              <div class="col-12">
                <va-form ref="form" type="vertical">
                  <va-form-item label="Correo Electrónico" need>
                    <va-input
                      name="Correo_Electrónico"
                      v-model="form.email"
                      placeholder="Nombre del área temática"
                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
                      clearable />
                  </va-form-item>
                  <va-form-item label="Contraseña" need>
                    <va-input
                      name="Contraseña"
                      v-model="form.password"
                      placeholder="Nombre del área temática"
                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
                      clearable />
                  </va-form-item>
                  <va-form-item label="Confirmar Contraseña" need>
                    <va-input
                      name="Confirmar_password"
                      v-model="form.password_confirmation"
                      placeholder="Nombre del área temática"
                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
                      clearable />
                  </va-form-item>
                </va-form>
              </div>
            </div>

            <template #footer>
              <div class="footer-dialog">
                <vs-button @click="edicion ? updateUsuario() : createUsuario()" color="rgb(22,212,149)" block>
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
      lineas:[],
      usuarios:[],
      tipos_usuario: [
        {'value':0,'label':'Visitante'},
        {'value':1,'label':'Estudiante'},
        {'value':2,'label':'Docente'},
        {'value':3,'label':'Administrador'},
      ],
      edicion:false,
      pagina: 1,
      total:0,
      form: new Form({
        id:undefined,
        name:'',
        last_name:'',
        tipo_usuario_id:'',
        cedula:'',
        telefono:'',
        email:'',
        password:'',
        password_confirmation:'',
        confirmacion_terminos_condiciones:false,
      }),
    }),
    mounted() {
      this.getCarrera();
      this.getUsuario();
    },
    created() {
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
          this.getCarrera();
          this.getUsuario();
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
          axios.get('/api/users?page=' + this.pagina)
            .then(response => {
              this.usuarios = response.data[0].data;
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

      createUsuario(){
        this.llamarAPI({tipo:'post', ruta:'api/users'})
        this.active = !this.active;
      },
      getUsuario(){
        this.llamarAPI({tipo:'get-paginado', ruta:'api/users', variable:'usuarios', variable2:'total'})
      },
      getCarrera(){
        this.llamarAPI({tipo:'get', ruta:'api/carrera', variable:'carreras'})
      },
      updateUsuario(){
        this.llamarAPI({tipo:'put', ruta:'api/users/', id:this.form.id})
        this.form.reset()
        this.active = !this.active;
      },
      deleteUsuario(id){
        this.llamarAPI({tipo:'delete', ruta:'api/users/', id:id})
      },
    },
  }
</script>