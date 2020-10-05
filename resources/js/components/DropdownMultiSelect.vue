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
            ></multiselect>
        </div>
        <button
            class="btn btn-outline-success ml-2 button"
            :disabled="isButtonDisabled"
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
            selectAll () {
                return [
                    {
                        name: _.isEqual(this.options, this.value)
                            ? 'очистить'
                            : 'выбрать всё',
                        options: this.options,
                    }
                ]
            },
            isButtonDisabled () {
                return _.isEmpty(this.value)
            }
        },
        methods: {
            send () {
                const values = _.map(this.value, (item) => {
                    return item.value
                })
                axios.post('/admin/reports/count', { counters: values })
                    .then( () => {
                    })
                    .catch( () => {})
            }
        }
    }
</script>

<style scoped>
    .button {
        height: 42.5px;
    }
</style>
