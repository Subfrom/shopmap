<template>
  <GoogleMap
    api-key=""
    style="width: 100%; height: 500px"
    :center="center"
    :zoom="3"
  >
    <!-- <Marker :options="{ position: center, }"> -->
    <Marker v-for="(location, i) in locations" :options="{ position: location }" :key="i">
    <InfoWindow :options="{ position: locations, content: locations[i].name }" :key="i">
      <div>
        <h1>{{ locations[i].name }}</h1>
        <p>{{ locations[i].address }}</p>
        <p>{{ locations[i].hours }}</p>
      </div>
    </InfoWindow>
    </Marker>
  </GoogleMap>
</template>

<script>
import { defineComponent } from 'vue'
import { GoogleMap, Marker, InfoWindow  } from 'vue3-google-map'

export default defineComponent({
  components: { GoogleMap, Marker, InfoWindow  },
  setup() {
    const center = { lat: 13.830081, lng: 100.457176 }
    
    const locations = [
    ]

    fetch('http://localhost:8000/api/restaurants')
        .then(response => response.json())
        .then(data => {
          // console.log(data);
          data.forEach(element => {
            locations.push(
              {
                lat: parseFloat(element.latitude),
                lng: parseFloat(element.longitude),
                name: String(element.name),
                address: String(element.address),
                hours: String(element.hours)
              })
            console.log(locations)
          });
        })
        .catch(error => console.error(error));

    return { center, locations }
  },
})
</script>