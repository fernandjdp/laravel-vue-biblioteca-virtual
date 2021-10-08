<template>
  <div class="container-fluid">
    <!--<vs-row justify="center">
      <estadisticas-carrera :carrera_id="carrera.id"></estadisticas-carrera>
    </vs-row>-->

    <info></info>

    <div class="row justify-content-center px-5 mx-1">
      <filtro-busqueda :carrera_id="carrera.id"></filtro-busqueda>
      <boton-nuevo-trabajo :carrera_id="carrera.id"></boton-nuevo-trabajo>   
    </div>
    
    <trabajos-especiales :carrera_id="carrera.id"></trabajos-especiales>


  </div>
</template>

<script>
   export default {
    name: 'bibliotecaDerecho',

    created(){
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
      });
    },
    mounted(){
    },
    data () {
      return {
        carrera: {id:0, nombre:'Derecho'} 
      }
    },
    methods:{
      reload(){
        Fire.$emit('recargar');
      }
    },
   }
</script>
