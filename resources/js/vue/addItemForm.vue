<template>
  <h3>Make a list of plants to research</h3>
  <h4>Cross them off when you fill out a Plant-A-Dex ID card!</h4>
  <div class="addItem">
    <input type="text" v-model="item.name" />

    <font-awesome-icon icon="plus-square" 
    @click="addItem()" :class="[item.name ? 'active' : 'inactive', 'plus']" />
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data: function () {
    return {
      item: {
        name: ''
      }
    };
  },
  methods: {
    addItem() {
      if (this.item.name == '') {
        return;
      }
      axios.post('api/item/store', {
        item: this.item
      })
        .then(response => {
          if (response.status == 201) {
            this.item.name = '';
            this.$emit('reloadlist');
          }
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
};
</script>

<style scoped>
.active {
  color: #349346;
}

.addItem {
  display: flex;
  justify-content: center;
  align-items: center;
}

.inactive {
  color: #999999;
}

input {
  background: #f7f7f7;
  border: 0px;
  outline: none;
  padding: 0.5rem;
  margin-right: 0.8rem;
  width: 100%;
}

.plus {
  font-size: 2rem;
}
</style>
