<template>
    <div class="container">
        <vs-row align="center" justify="center">
            <div class="row" v-for="icon in ICONS">
                <div class="col-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <font-awesome-icon :icon="icon" />  
                                </div>
                                <div class="col-auto">
                                    <h6>{{ icon }}</h6>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </vs-row>
    </div>
</template>

<script>
    const LISTA_ICONOS = require('./lista_iconos.json')
    export default {
        created() {
            this.ICONS = LISTA_ICONOS;
        }
    }
</script>
