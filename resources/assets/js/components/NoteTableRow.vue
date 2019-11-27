<template>
    <tr>
        <td> {{ note.id }}</td>
        <td> {{ note.text }}</td>
        <td>
            <form method="post" :action="note.deleteRoute" v-on:submit.prevent="submitDelete">
                <button class="btn btn-danger">Удалить</button>
            </form>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['note'],
        methods: {
            submitDelete: function () {
                let thisVue = this;
                axios.post(this.note.deleteRoute)
                    .then(response => {
                        thisVue.$root.$emit('change-note-list');
                    });
            }
        },
    }
</script>