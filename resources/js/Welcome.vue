<template>
  <div>
  <br>
<b-card class="text-center">
  <div>
  <label for="name">ชื่อร้าน : </label>
  <b-form-input v-model="text" placeholder="Enter your name"></b-form-input>
  <input v-model.text="name" id="name" type="text" min="-180" max="180" step="10" />
  </div>
</b-card>
<br>
</div>

<GoogleMap
api-key=""
ref="mapRef"
style="width: 100%; height: 800px"
:center="center"
:zoom="12"

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
  
  const locations = []

  fetch('http://localhost:8000/api/restaurants')
      .then(response => response.json())
      .then(data => {
        data.forEach(element => {
          locations.push(
            {
              lat: parseFloat(element.latitude),
              lng: parseFloat(element.longitude),
              name: String(element.name),
              address: String(element.address),
              hours: String(element.hours)
            })
        });
      })
      .catch(error => console.error(error));

  return { center, locations }
},
})
</script>