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
        mapboxgl.accessToken = 'pk.eyJ1IjoiZGV2aW5ub3JnYXJiIiwiYSI6ImNqdng0eHg2bzAxY3g0M3Fod2xhM3UwbjIifQ.EPhspJykDVYlIc7DTdoWYg';
        this.map = new mapboxgl.Map({
            container: this.$refs.map,
            style: 'mapbox://styles/devinnorgarb/clt9uxm3e00ts01pj1g0e4i57', // Replace with your desired style
            center: [-74.5, 40], // Replace with your initial center coordinates
            zoom: 9, // Replace with your initial zoom level
        });

        // Subscribe to the Soketi channel for real-time updates
        window.Echo.channel('ride-tracker')
            .listen('CoordinateUpdateEvent', (event) => {
                // Use the received coordinates to update the map
                const coordinates = event.coordinates;
                this.updateMapWithCoordinates(coordinates);
            });
    },
    beforeDestroy() {
        if (this.map) {
            this.map.remove();
        }
    },
    methods: {
        updateMapWithCoordinates(coordinates) {
            // Update the map with new coordinates, e.g., by adding markers or updating a line layer
            // Example: Add a marker for each coordinate
            coordinates.forEach((coordinate) => {
                new mapboxgl.Marker()
                    .setLngLat([coordinate.longitude, coordinate.latitude])
                    .addTo(this.map);
            });

            // Example: Update a line layer with the new coordinates
            const lineString = {
                type: 'Feature',
                properties: {},
                geometry: {
                    type: 'LineString',
                    coordinates: coordinates.map(coordinate => [coordinate.longitude, coordinate.latitude]),
                },
            };

            this.map.getSource('line-source').setData(lineString);
        },
    },
};
</script>

<style scoped>
.map-container {
    height: 100%;
    width: 100%;
}
</style>
