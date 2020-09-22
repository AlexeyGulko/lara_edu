<template>
    <div>
        <label class="typo__label">Выберите что посчитать</label>
        <multiselect
            v-model="value"
            :options="options"
            :multiple="true"
            :close-on-select="false"
            :searchable="false"
            :clear-on-select="false"
            :preserve-search="false"
            placeholder="посчитать..."
            label="name"
            track-by="name"
            selectLabel=""
            deselectLabel=""
            selectedLabel="выбрано"
        >
        </multiselect>
        <pre class="language-json"><code>{{ value  }}</code></pre>
    </div>
</template>

<script>
    export default {
        props: {
          options: [],
        },
        data () {
            return {
                value: [],
            }
        }
    }
</script>
