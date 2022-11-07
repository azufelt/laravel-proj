
require('./bootstrap');


// Initialize new Vue App
import { createApp } from 'vue'
import App from './vue/app.vue'
const app = createApp(App)


/* Font Awesome Icons */
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import specific icons */
import { faPlusSquare,faTrash } from '@fortawesome/free-solid-svg-icons'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* add icons to the library */
library.add( faPlusSquare, faTrash )


createApp(App)
app.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app')


