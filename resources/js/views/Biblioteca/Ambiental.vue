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
    name: 'bibliotecaAmbiental',

    created(){
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
      });
    },
    mounted(){
    },
    data () {
      return {
        carrera: {id:1, nombre:'Ingenieria Ambiental'} 
      }
    },
    methods:{
      reload(){
        Fire.$emit('recargar');
      }
    },
   }
</script>
