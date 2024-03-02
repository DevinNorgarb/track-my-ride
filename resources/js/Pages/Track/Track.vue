<script>
export default {
    name: "Track",
    data() {
        return {
            track: {
                id: null,
                name: null,
                description: null,
                status: null,
                created_at: null,
                updated_at: null,
            },
            loading: false,
            errors: {},
        }
    },
    methods: {
        getTrack() {
            this.loading = true;
            this.$inertia.get(route('track.show', this.$route.params.id), {
                onSuccess: (page) => {
                    this.track = page.props.track;
                },
                onError: (errors) => {
                    this.errors = errors;
                },
                onFinish: () => {
                    this.loading = false;
                }
            });
        },
    },
}
</script>

<template>




</template>

<style scoped>

</style>
