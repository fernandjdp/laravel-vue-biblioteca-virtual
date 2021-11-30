<template>
    <div class="col-2 d-grid">
      <button type="button" @click="nuevoTrabajo" class="d-flex btn btn-primary bg-gradient border-light shadow rounded-pill justify-content-around align-items-center">
        <font-awesome-icon icon="plus" size="3x" />
        <h3 class="text-white">
          Nuevo Trabajo
        </h3>
      </button>
    </div>
</template>

<script>
	export default 
	{
		data () {
		    return {
          active: 0,
          dialog: null, 
		      elevation: 3,
		      padding: 10
		    }
		},

		methods: {
      nuevoTrabajo(){
        this.$router.push('nuevo-trabajo')
      },
    }
	}
</script>
