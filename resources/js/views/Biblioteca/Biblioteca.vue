<template>
  <div class="container-fluid">

    <div class="row justify-content-center px-5 mx-1">
      <filtro-busqueda :carrera_id="$store.state.route.params.carrera_id"></filtro-busqueda>
      <boton-nuevo-trabajo></boton-nuevo-trabajo>   
    </div>
    
    <trabajos-especiales :carrera_id="$store.state.route.params.carrera_id"></trabajos-especiales>


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
    methods:{
      reload(){
        Fire.$emit('recargar');
      }
    },
   }
</script>
