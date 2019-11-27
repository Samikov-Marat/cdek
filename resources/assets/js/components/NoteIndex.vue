<template>
    <div>
        <h2>Список</h2>
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Текст заметки</th>
                <th></th>
            </tr>

            <note-table-row v-for="note in notes" v-bind:key="note.id" v-bind:note="note"></note-table-row>

        </table>
    </div>

</template>

<script>
    export default {
        props: {
            apiUrl: String,
            notesDefault: Array
        },
        data: function () {
            return {
                notes: this.notesDefault
            };
        },

        mounted() {
            let thisVue = this;
            this.$root.$on('change-note-list', function () {
                axios
                    .get(thisVue.apiUrl)
                    .then(response => (thisVue.notes = response.data));
            })
        }
    }
</script>