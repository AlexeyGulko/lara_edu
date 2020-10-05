<template>
    <div class="notification-container">
        <post-notification
            v-for="(post, index) in posts"
            :item="post"
            :key="index"
        ></post-notification>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                posts: []
            }
        },
        mounted () {
            Echo.private('post')
                .listen('PostUpdatedEvent', (data) => {
                    this.posts.push(data.post)
                })
        },
    }
</script>
<style scoped>
    .notification-container
    {
        position: fixed;
        bottom: 10px;
        right: 50px;
        min-height: 10px;
        z-index: 10;
    }
</style>
