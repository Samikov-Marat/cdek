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
        props: ['note'], // Заметка для отображения
        methods: {
            // Обрабатываем нажатие на кнопку удаления заметки (заменяем обработчик отправки формы)
            submitDelete: function () {
                let thisVue = this;
                // Отправляем запрос на удаление заметки
                axios.post(this.note.deleteRoute)
                    .then(response => {
                        // Оповещаем другие компоненты об изменении списка. Генерируем событие приложения.
                        thisVue.$root.$emit('change-note-list');
                    });
            }
        },
    }
</script>