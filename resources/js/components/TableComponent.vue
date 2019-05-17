<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="actividad in actividades" :key="actividad.id">
                <th scope="row">{{actividad.id}}</th>
                <td>{{actividad.titulo}}</td>
                <td>{{actividad.categoria_id}}</td>
                <td>Acciones</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        mounted() {
            this.getActividades()
        },

        data(){
            return{
                actividades:[]
            }
        },

        methods:{
            getActividades(){
                var urlActividades = "actividades";
                axios.get(urlActividades).then(response=>{
                this.actividades = response.data
                });
            },

        }
    }
</script>
