<template>
  <h1>🪴 Plant-A-Dex 🪴</h1>
  <div class="dashboardContainer">
    <div class="todoListContainer">
      <div class="heading">
        <h2 id="title">Research List</h2>
        <add-item-form
        v-on:reloadlist="getList()"
        />
      </div>
      <list-view :items="items" v-on:reloadlist="getList()" />
    </div>

    <div class="plantCardContainer">
      <h2>I.D. Card</h2>
      <plant-item-form/>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import addItemForm from "./addItemForm";
import listView from "./listView";
import plantItemForm from "./plantItemForm";

export default {
  components: {
    addItemForm,
    listView,
    plantItemForm
  },
  data: function () {
    return {
      items: [],
      plants: []
    }
  },
  methods: {
    getList() {
      axios.get('api/items')
        .then(response => {
          this.items = response.data;
        })
        .catch(error => {
          console.log(error.response);
        })
    }
  },
  // lifecycle-event, when component is created run getList method.
  created() {
    this.getList();
    console.log("getList function")
  }
}
</script>

<style scoped>
.dashboardContainer {
  display: flex;
  padding: 2rem;
}
.heading {
  background-color: lightgray;
  padding: 1rem;
}
h1 {
  text-align: center;
  font-size: 3rem;
}
h2 {
  text-align: center;
}

.plantCardContainer {
  border: 2px solid black;
  display: flex;
  flex-direction: column;
  padding: 1rem;
  width: 50%
}

#title {
  text-align: center;
}

.todoListContainer {
  width: 350px;
  margin: auto;
}
</style>