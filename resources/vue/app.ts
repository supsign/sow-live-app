import "./bootstrap";

import { Vue } from "vue-property-decorator";
import Vuex from "vuex";
import VueResults from "./results.vue";

// import VueInput from './components/form/input.vue';
// import VueSelect from './components/form/select.vue';
// import VueForm from './components/form/form.vue';

Vue.use(Vuex);

const store = new Vuex.Store({
    strict: true,
    modules: {}
});

const app = new Vue({
    el: "#app",
    components: {
        VueResults
    },
    store
});
