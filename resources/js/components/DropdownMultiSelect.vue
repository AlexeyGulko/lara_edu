<template>
    <div class="row flex-nowrap">
        <div class="w-100">
            <multiselect
                v-model="value"
                :options="selectAll"
                :multiple="true"
                group-values="options"
                group-label="name"
                :group-select="true"
                :close-on-select="false"
                :searchable="false"
                label="name"
                track-by="name"
                placeholder="посчитать..."
                selectLabel=""
                deselectLabel=""
                selectedLabel="выбрано"
                selectGroupLabel=""
                deselectGroupLabel=""
            >
            </multiselect>
        </div>
        <button
            class="btn btn-outline-success ml-2 button"
            @click="send"
        >
            Отправить
        </button>
    </div>
</template>

<script>
    export default {
        props: ['options'],
        data () {
            return {
                value: [],
            }
        },
        computed: {
            selectAll: function () {
                return [
                    {
                        name: 'выбрать всё',
                        options: this.options,
                    }
                ]
            }
        },
        methods: {
            send () {
                console.log(JSON.parse(JSON.stringify(this.value)))
                axios.post('/admin/reports/count', this.value)
                    .then( (response) => {
                        console.log(response)
                    })
                    .catch( (response) => {
                        console.log(response)
                    })
            }
        }
    }
</script>
<style scoped>
    .button {
        height: 42.5px;
    }
</style>
