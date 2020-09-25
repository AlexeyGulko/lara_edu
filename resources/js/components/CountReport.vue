<template>
    <table
        class="table"
        v-if="null !== counters"
    >
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">название</th>
            <th scope="col">количество</th>
        </tr>
        </thead>
        <tbody>
        <tr
            v-for="(counter, index) in counters"
            :key="index"
        >
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ counter.name }}</td>
            <td>{{ counter.value }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data () {
            return {
                counters: null
            }
        },
        mounted() {
            Echo.private('reports.count')
                .listen('CountReportGenerated', (data) => {
                        this.counters = data.counters
                    }
                )
        }
    }
</script>
