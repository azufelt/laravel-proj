<template>
  <div class="idForm">
    <div>
      <label for="name">Common Name: </label>
      <input id="name" name="name" type="text" v-model="plant.name" />
    </div>
    <div>
      <label for="family"> Plant Family: </label>
      <input id="family" name="family" type="text" v-model="plant.family" />
    </div>
    <div>
      <label for="plantdesc">Description: </label>
      <textarea name="plantdesc" id="plantdesc" placeholder="This plant has. . . " v-model="plant.plantdesc"></textarea>
    </div>
    <div>
      <label for="grow_season"> Growing Season: </label>
      <input id="grow_season" name="grow_season" type="text" v-model="plant.grow_season" />
    </div>
    <div>
      <label for="grow_temp"> Growing Temp: </label>
      <input id="grow_temp" name="grow_temp" type="number" v-model="plant.grow_temp" />
    </div>
    <div>
      <label for="humidty"> Humidty: </label>
      <input id="humidty" name="humidty" type="number" v-model="plant.humidity" />
    </div>
    <div>
      <label for="img"> Img: </label>
      <input id="img" name="img" type="text" v-model="plant.img" />
    </div>
    <div>
      <label for="propagate"> Propagation: </label>
      <input id="propagate" name="propagate" type="text" v-model="plant.propagate" />
    </div>
    <div>
      <label for="sunlight">Sun Needs:</label>
      <select v-model="plant.sunlight.select">
        <option disabled value="">Please select one</option>
        <option>Full Sun</option>
        <option>Part Sun</option>
        <option>Shade</option>
      </select>
    </div>
    <div>
      <label for="toxic"> Toxicity Level: </label>
      <input id="toxic" name="toxic" type="number" v-model="plant.toxic" />
    </div>
    <div>
      <label for="water"> Watering: </label>
      <input id="water" name="water" type="text" v-model="plant.water" />
    </div>
    <div>
      <label for="zone"> Growing Zone: </label>
      <input id="zone" name="zone" type="number" v-model="plant.zone" />
    </div>
    <button type="submit" class="btn" @click="addPlant()">Add Plant
    </button>
  </div>

</template>

<script>
import axios from 'axios';

export default {
  data: function () {
    return {
      plant: {
        name: '',
        plantdesc: '',
        family: '',
        grow_season: '',
        grow_temp: '',
        humidity: '',
        img: '',
        propagate: '',
        sunlight: '',
        toxic: '',
        water: '',
        zone: ''
      }
    };
  },
  methods: {
    addPlant() {
      if (this.plant.name == '') {
        return;
      }
      axios.post('api/plant/store', {
        plant: this.plant
      })
        .then(response => {
          if (response.status == 201) {
            this.plant.name = '';
            this.plant = '';
          }
        })
        .catch(error => {
          console.log(error.response);
        })
    }
  }
};
</script>

<style scoped>

.btn {
 grid-column: 1/3;
 margin: 0 auto;
 margin-top: 1rem;
 padding: 1rem;
}
.idForm {
  display: grid;
  grid-template-columns: 1fr auto;
}

input,
textarea, select, .btn, label {
  display: block;
  font-size:1.2rem;
}
</style>