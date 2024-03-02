<template>
    <div ref="map" class="map-container"></div>
</template>

<script>
import mapboxgl from 'mapbox-gl';

export default {
    data() {
        return {
            map: null,
        };
    },
    mounted() {
        mapboxgl.accessToken = 'YOUR_MAPBOX_ACCESS_TOKEN';
        this.map = new mapboxgl.Map({
            container: this.$refs.map,
            style: 'mapbox://styles/mapbox/streets-v11', // Replace with your desired style
            center: [-74.5, 40], // Replace with your initial center coordinates
            zoom: 9, // Replace with your initial zoom level
        });
    },
    beforeDestroy() {
        if (this.map) {
            this.map.remove();
        }
    },
};
</script>

<style scoped>
.map-container {
    height: 100%;
    width: 100%;
}
</style>
