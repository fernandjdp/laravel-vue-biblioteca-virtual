<template>
    <div class="col-2">
      <a href="#" class="btn btn-dark text-white">
        <router-link to="/nuevo-trabajo" class="nav-link text-center">
          <span class="d-flex align-items-center">
              <span class="icon icon-brand mr-2 mr-md-3"><span class="fas fa-plus text-white"></span></span>
              <span class="d-inline-block text-left text-white">
                  <small class="font-weight-normal text-white d-none d-md-block">Nuevo</small> <b class="text-center">Trabajo de grado</b>
              </span> 
          </span>
        </router-link>
      </a>
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
		props: {
      carrera_id: {
        type: Number,
        required: false
      },
    },

		methods: {
      cardClick(index){
        this.active = !this.active;
        this.dialog = index;
      },
    }
	}
</script>
