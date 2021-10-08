<template>
  <div class="container-fluid">
    <vs-row justify="center">
      <estadisticas-carrera :carrera_id="carrera.id"></estadisticas-carrera>
    </vs-row>

    <filtro-busqueda></filtro-busqueda>
    
    <trabajos-especiales :carrera_id="carrera.id"></trabajos-especiales>
  
  </div>
</template>

<script>
   export default {
    name: 'bibliotecaGerenciales',

    created(){
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
      });
    },
    mounted(){
    },
    data () {
      return {
        carrera: {id:3, nombre:'Procesos Gerenciales'} 
      }
    },
    methods:{
      reload(){
        Fire.$emit('recargar');
      }
    },
   }
</script>
