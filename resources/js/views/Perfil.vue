<template>
	<div class="container">
		<div class="justify-content-flex-end">
			<div class="row">
				<div class="col-8">

					<!-- Card descripcion del trabajo -->
					<div v-if="this.$userInfo.tipo_usuario_id == 1" class="card border-light shadow rounded-card mb-3">
						<div class="card-body">
							<h3>Trabajo de grado</h3>
							<div v-if="this.$userInfo.trabajo_id">
								<div class="row">
		              <div class="col-6">
		                <va-form ref="form" type="vertical">
		                  <va-form-item label="Nombre">
		                    <va-input
		                      name="Nombre"
		                      disabled
		                      v-model="info_usuario.trabajo.nombre"
		                      placeholder="Nombre del trabajo de grado"
		                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
		                      clearable />
		                  </va-form-item>
		                  <va-form-item label="Alias">
		                    <va-input
		                      name="Alias"
		                      disabled
		                      v-model="info_usuario.trabajo.alias"
		                      placeholder="Alias que aparecerá como título en la biblioteca"
		                      :rules="[{type:'required', tip:'Este campo es necesario'}]"
		                      clearable />
		                  </va-form-item>
		                  <va-form-item label="Carrera">
		                    <va-select
		                      search
		                      disabled
		                      name="Carrera"
		                      v-model="info_usuario.trabajo.carrera_id"
		                      :options="carreras"
		                      :rules="[{type:'required'}]">
		                    </va-select>
		                  </va-form-item>
		                </va-form>        
		              </div>
		              <div class="col-6">
		                <va-form ref="form" type="vertical">
		                <va-form-item label="Descripcion">
		                  <va-textarea
		                  disabled 
		                  v-model="info_usuario.trabajo.descripcion"
		                  :resize="true"
		                  minHeight="180px">
		                  </va-textarea>
		                </va-form-item>
		              </va-form>
		              </div>
		              <div class="col-12">
		                <va-form ref="form" type="vertical">
		                  <va-form-item label="Linea de Investigacion">
		                      <va-select
		                        search
		                      disabled
		                        name="Linea"
		                        v-model="info_usuario.trabajo.linea_id"
		                        :options="lineas"
		                        :rules="[{type:'required'}]">
		                      </va-select>
		                    </va-form-item>
		                    <va-form-item label="Área Temática">
		                      <va-select
		                        search
		                      disabled
		                        name="AreaTematica"
		                        v-model="info_usuario.trabajo.areaTematica_id"
		                        :options="areas_tematicas"
		                        :rules="[{type:'required'}]">
		                      </va-select>
		                    </va-form-item>
		                  </va-form>
		                </div>
	              </div>
						  </div>

						  <div v-else>
						  	<vs-alert relief >
							    <template #title>
							      No disponible
							    </template>
							    Parece que no tienes un trabajo especial de grado registrado actualmente, puedes registrar tu trabajo fácilmente haciendo click <b><a @click="$router.push({path:'nuevo-trabajo'})">aquí</a></b>
							  </vs-alert>
						  </div>
							
						</div>

					</div>

					<div class="card border-light shadow rounded-card mb-3">
						<div class="card-body">
							<h3>Notificaciones</h3>
								<div v-if="info_usuario.notificaciones.length > 0">
										<div class="add-scroll">
										<div v-for="notif in info_usuario.notificaciones">
											<div :class="'bd-callout bd-callout-'+notif.tipo">
									    	<h4 :class="'text-'+notif.tipo">{{notif.titulo}}</h4>
									    	{{notif.texto}}
									  	</div>					
										</div>
									</div>									
								</div>
								<div v-else>
									<vs-alert relief color="rgb(211,211,211)">
							    <template #title>
							      Bandeja limpia
							    </template>
							    Actualmente no tienes notificaciones
							  </vs-alert>
								</div>
						</div>
					</div>

				</div>
				<div class="col-4">
					<div class="card border-light shadow rounded-card">
						<div class="card-body">
							<div class="justify-content-center items-centered">
								<h3>Nombre completo</h3>
								<h6 class="card-title text-uppercase text-muted mb-0 text-centered">
						            Carrera
						          </h6>
								<vs-avatar size="200" circle>
								 	<div v-if="false">
								 	 	<!-- Aqui la variable de imagen -->
								 	</div>
								 	<div v-else>
							        	<img src="/images/vendor/placeholders/Profile_avatar_placeholder_large.png" alt="">								 	 	
								 	</div>
							    </vs-avatar>
							</div>
							<div>
							    <va-form ref="form" type="vertical">
	                  	<va-form-item label="Nombre" need>
	                    	<va-input
	                        name="Nombre"
	                        v-model="form.name"
	                        placeholder="Carlos Andres"
	                        :rules="[{type:'required', tip:'Este campo es necesario'}]"
	                        clearable />
	                  	</va-form-item>
	                	<va-form-item label="Apellido" need>
		                  	<va-input
		                    name="Apellido"
		                    v-model="form.last_name"
		                    placeholder="Pérez Sanchez"
		                    :rules="[{type:'required', tip:'Este campo es necesario'}]"/>
	                	</va-form-item>
	                	<va-form-item label="Correo Electrónico" need>
		                  	<va-input
		                    name="Correo Electrónico"
		                    v-model="form.email"
		                    placeholder="carlos@gmail.com"
		                    :rules="[{type:'required', tip:'Este campo es necesario'}]"/>
	                	</va-form-item>
	                	<va-form-item label="Cédula" need>
		                  	<va-input
		                    name="Cédula"
		                    v-model="form.cedula"
		                    placeholder="22777381"
		                    :rules="[{type:'required', tip:'Este campo es necesario'}]"/>
	                	</va-form-item>
	                	<va-form-item label="Teléfono" need>
		                  	<va-input
		                    name="Teléfono"
		                    v-model="form.telefono"
		                    placeholder="+58 400 000 000"
		                    :rules="[{type:'required', tip:'Este campo es necesario'}]"/>
	                	</va-form-item>
	                	<va-form-item label="Telegram" need>
		                  	<va-input
		                    name="Telegram"
		                    v-model="form.telegram"
		                    placeholder="@carlos"
		                    :rules="[{type:'required', tip:'Este campo es necesario'}]"/>
	                	</va-form-item>
	                	<va-form-item label="Perfil LinkedIn" need>
		                  	<va-input
		                    name="Perfil LinkedIn"
		                    v-model="form.linkedin_url"
		                    placeholder="www.linkedin.com/in/carlos"
		                    :rules="[{type:'required', tip:'Este campo es necesario'}]"/>
	                	</va-form-item>
	                	<va-form-item label="Contraseña" need>
		                  	<va-input
		                    name="Contraseña"
		                    v-model="form.password"
		                    placeholder=""
		                    />
	                	</va-form-item>
	                </va-form>
	                <vs-button @click="actualizarPerfil" blank primary block>
                    <h4 class="text-white">Actualizar perfil</h4>
                  </vs-button>					
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {

  name: 'Perfil',

  data () {
    return {
    	active: false,
    	areas_tematicas:[],
      carreras:[],
      estudiantes:[],
      lineas:[],
      info_usuario:[],
    	form: new Form({
	      id:undefined,
        name:'',
        last_name:'',
        tipo_usuario_id:'',
        cedula:'',
        telefono:'',
        trabajo_id:'',
        email:'',
        telegram:'',
        linkedin_url:'',
        password:'',
        password_confirmation:'',
        confirmacion_terminos_condiciones:false,
      }),
    }
  },

  mounted(){
  	this.getInfo()
  },

methods: {
		getInfo(){
			if (this.$userInfo.trabajo_id) {
  			this.getInfoSelectCarreras()
  			this.getInfoSelectLineas()
  			this.getInfoSelectAreasTematicas()
  			this.getInfoSelectEstudiantes()
			}
			this.form.fill(this.$userInfo)
			this.getUserInfo()
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
    getUserInfo(){
    	this.llamarAPI({tipo:'get', ruta:'api/get_estudiante/'+this.$userInfo.id, variable:'info_usuario'})
    },
    actualizarPerfil () {
      this.llamarAPI({tipo:'put', ruta:'api/users/', id:this.form.id})
    }
  }
}
</script>

<style lang="css" scoped>
</style>