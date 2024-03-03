    <script>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import {Head} from '@inertiajs/vue3';
    import Map from '@/Components/Map.vue';

    export default {
        components: {
            Map,
            AuthenticatedLayout,
            Head,
        },
    };
    </script>

    <template>
        <Head title="Dashboard"/>

        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            </template>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-4 lg:px-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <Map class="full-width"></Map>
                        <div class="p-6 text-gray-900">
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </template>

    <style>
    .full-width {
        width: 100%;
        height: 1000px !important;
    }
    </style>
