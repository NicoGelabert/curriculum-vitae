<template>
    <div>
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl font-semibold">Features</h1>
            <button type="button"
                  @click="showAddNewModal()"
                  class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:text-black hover:bg-white focus:outline-none"
                  >
                  Add new feature
            </button>
        </div>
        <FeaturesTable @clickEdit="editFeature"/>
        <FeatureModal v-model="showFeatureModal" :feature="featureModel" @close="onModalClose"/>
    </div>
</template>

<script setup>
import {computed, ref} from "vue";
import store from "../../store";
import FeaturesTable from "./FeaturesTable.vue";
import FeatureModal from "./FeatureModal.vue";

const DEFAULT_FEATURE = {
    id:'',
    image: '',
    title: '',
    description: '',
}

const features = computed(() => store.state.features);

const featureModel = ref({...DEFAULT_FEATURE});
const showFeatureModal = ref(false);

function showAddNewModal(){
    showFeatureModal.value = true
}

function editFeature(h){
    store.dispatch('getFeature', h.id)
    .then(({data}) => {
        featureModel.value = data
        showAddNewModal(); 
    })
}

function onModalClose(){
    featureModel.value = {...DEFAULT_FEATURE}
}

</script>