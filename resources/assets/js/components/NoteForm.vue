<template>

    <form method="post" :action="apiUrl" v-on:submit.prevent="onSubmit">
        <div class="form-group">
            <label for="text">Текст заметки</label>
            <textarea class="form-control" id="text" rows="3" v-model="text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>

</template>


<script>
    export default {
        props: {
            apiUrl: String, // Адрес для добавления заметок через api
        },
        data: function () {
            return {
                text: '',
            };
        },
        methods: {
            onSubmit: function () {
                // Отправляем запрос на добавление заметки
                axios.post(this.apiUrl, {text: this.text})
                    .then(response => {
                        // Оповещаем другие компоненты об изменении списка. Генерируем событие приложения.
                        this.$root.$emit('change-note-list');
                    });
                // Очистка формы
                this.text = '';
            }
        }
    }
</script>