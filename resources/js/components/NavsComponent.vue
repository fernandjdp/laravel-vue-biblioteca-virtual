
<template>
    <div class="hidden">
      <!-- Por los momentos no será necesario una barra superior -->
      <!-- NAVBAR SUPERIOR 
      <vs-navbar shadow square center-collapsed v-model="active">
        <template #left>
          <vs-button @click="activeSidebar = !activeSidebar" flat icon>
            <font-awesome-icon icon="bars" />
          </vs-button>
        </template>
        <vs-navbar-item :active="active == 'guide'" id="guide">
          Guide
        </vs-navbar-item>
        <vs-navbar-item :active="active == 'docs'" id="docs">
          Documents
        </vs-navbar-item>
        <vs-navbar-item :active="active == 'components'" id="components">
          Components
        </vs-navbar-item>
        <vs-navbar-item :active="active == 'license'" id="license">
          license
        </vs-navbar-item>
        <template #right>
          <vs-button flat >Login</vs-button>
          <vs-button>Logout</vs-button>
        </template>
      </vs-navbar>
      /NAVBAR SUPERIOR -->

      <!-- NAVBAR LATERAL (SIDEBAR) -->
      <vs-sidebar
        absolute
        reduce
        v-model="active"
        open
        >
        <template #logo>
          <font-awesome-icon icon="book-reader" size="2x" />
        </template>
        <!--<template #logo>
          <h2>U</h2>
        </template>-->
        <vs-sidebar-item to="/dashboard" id="dashboard">
          <template #icon>
            <font-awesome-icon icon="home" />
          </template>
          Dashboard
        </vs-sidebar-item>
        <vs-sidebar-item v-show="this.$userType >= 1" to="/perfil" id="perfil">
          <template #icon>
            <font-awesome-icon icon="user" />
          </template>
          Perfil
        </vs-sidebar-item>
        <vs-sidebar-group>
          <template #header>
            <vs-sidebar-item arrow>
              <template #icon>
                <font-awesome-icon icon="book" />
              </template>
              Biblioteca
            </vs-sidebar-item>
          </template>
          <vs-sidebar-item to="/derecho" id="derecho">
            <template #icon>
              <font-awesome-icon icon="landmark" />
            </template>
            Derecho
          </vs-sidebar-item>
          <vs-sidebar-item to="/ingenieria-ambiental" id="ingenieria-ambiental">
            <template #icon>
              <font-awesome-icon icon="tree" />
            </template>
            Ingenieria Ambiental
          </vs-sidebar-item>
          <vs-sidebar-item to="/ingenieria-electronica" id="ingenieria-electronica">
            <template #icon>
              <font-awesome-icon icon="ethernet" />
            </template>
            Ingeniería Electrónica
          </vs-sidebar-item>
          <vs-sidebar-item to="/procesos-gerenciales" id="procesos-gerenciales">
            <template #icon>
              <font-awesome-icon icon="chart-bar" />
            </template>
            Procesos Gerenciales
          </vs-sidebar-item>
          <vs-sidebar-item to="/turismo" id="turismo">
            <template #icon>
              <font-awesome-icon icon="map-marked-alt" />
            </template>
            Turismo
          </vs-sidebar-item>
        </vs-sidebar-group>
        <vs-sidebar-group v-show="this.$userType >= 2">
          <template #header>
            <vs-sidebar-item arrow>
              <template #icon>
                <font-awesome-icon icon="cogs" />
              </template>
              Administracion
            </vs-sidebar-item>
          </template>
          <!--<vs-sidebar-item to="/carreras" id="carreras">
            <template #icon>
              <font-awesome-icon icon="book-open" />
            </template>
            Carreras
          </vs-sidebar-item>-->
          <vs-sidebar-item to="/usuarios" id="usuarios">
            <template #icon>
              <font-awesome-icon icon="users" />
            </template>
            Usuarios Registrados
          </vs-sidebar-item>
          <vs-sidebar-item to="/lineas" id="lineas-investigacion">
            <template #icon>
              <font-awesome-icon icon="project-diagram" />
            </template>
            Lineas de Investigación
          </vs-sidebar-item>
          <vs-sidebar-item to="/areas-tematicas" id="areas-tematicas">
            <template #icon>
              <font-awesome-icon icon="bookmark" />
            </template>
            Áreas Temáticas
          </vs-sidebar-item>
          <vs-sidebar-item to="/auditoria" id="auditoria">
            <template #icon>
              <font-awesome-icon icon="shoe-prints" />
            </template>
            Auditoría
          </vs-sidebar-item>
          <vs-sidebar-item to="/revision" id="revision">
            <template #icon>
              <font-awesome-icon icon="user-shield" />
            </template>
            Revisión
          </vs-sidebar-item>
        </vs-sidebar-group>
        <vs-sidebar-item to="/docente" id="docente">
          <template #icon>
            <font-awesome-icon icon="user-tie" />
          </template>
          Docente
        </vs-sidebar-item>
        <vs-sidebar-item v-show="this.$userType >= 3" to="/iconos" id="iconos">
          <template #icon>
            <font-awesome-icon icon="icons" />
          </template>
          Iconos
        </vs-sidebar-item>
        <template #footer>
          <vs-row justify="space-between">
            <vs-avatar>
              <!-- -->
            </vs-avatar>
            <vs-button
              icon
              color="danger"
              :active="active == 0"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              >
              <font-awesome-icon icon="power-off" />
            </vs-button>
          </vs-row>
        </template>
      </vs-sidebar>
      <!-- /NAVBAR LATERAL (SIDEBAR) -->
    <form id="logout-form" action="logout" method="POST" style="display: none;">
    <input type="hidden" name="_token" :value="csrf">
    </form>
    </div>
  </template>
<script>
  export default {
    name: 'NavLateral',
    data:() => ({
      active: 'home',
      carreras: [],
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      activeSidebar: false  
    }),
    mounted(){
      this.llamarAPI({tipo:'get', ruta:'api/carrera', variable:'carreras'})
      console.log(this.$userType)
    },
     methods: {
      enviarParametros(){
      },
      submit : function(){
      this.$refs.form.submit();
      }
    }
  }
</script>

        