<template>
    <div
        v-if="show"
        class="toast show"
    >
        <div class="toast-header">
                <strong class="mr-auto">
                    Пост изменён
                </strong>
            <small class="text-muted">{{ ago }}</small>
            <button
                type="button"
                class="ml-2 mb-1 close"
                @click="show = !show"
            >
                <span>&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <strong class="d-block">Название:</strong>
            {{ item.title }}
            <strong class="d-block">Изменено:</strong>
            {{ item.updated.join(' ') }}
            <div>
                <a :href="item.url">
                    подробнее...
                </a>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['item'],
        data () {
            return {
                ago: timeAgo.format(this.item.updated_at, 'ru'),
                show: true,
            }
        },
        created () {
            setInterval(() => {
                this.ago = timeAgo.format(this.item.updated_at, 'ru')
            }, 60000)
        },
    }
</script>
<style scoped>
    .toast {
        min-width: 300px;
        max-width: 400px;
    }
    button:focus {
        outline: 0;
    }
    .text-muted{
        margin-left: 10px;
    }
</style>
