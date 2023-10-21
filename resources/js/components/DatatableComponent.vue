<template>
    <div class="row center">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Población</th>
                    <th>Código</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="estado in rows" :key="estado.ID">
                    <td>{{ estado.ID }}</td>
                    <td>{{ estado.NOMBRE }}</td>
                    <td>{{ estado.POBLACION }}</td>
                    <td>{{ estado.CODIGO }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            rows: [],
        };
    },
    methods: {
        showEstados: function () {
            axios.get('/estados/getEstados').then((res) => {
                this.rows = res.data;
            });
        },
    },
    created: function () {
        this.showEstados();
    },
};
</script>

  