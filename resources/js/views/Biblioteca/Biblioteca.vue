<template>
  <div class="container-fluid">
    <vs-row justify="center">
      <estadisticas :carrera="carrera"></estadisticas>
    </vs-row>
    
    <trabajos :carrera="carrera"></trabajos>
  
  </div>
</template>

<script>
   export default {
    name: 'Biblioteca',
    props: {
      carrera: {
        type: Object,
        required: false
      },
    },
    watch: {
      '$route':'reload'
    },
    created(){
      Fire.$on('recargar',() => {
        //Buscar la manera de recargar la página
      });
    },
    mounted(){
    },
    data:() => ({
      active: false, 
      estadisticas:[],
      trabajos_especiales:[],
    }),
    methods:{
      reload(){
        Fire.$emit('recargar');
      }
    },
   }
</script>
