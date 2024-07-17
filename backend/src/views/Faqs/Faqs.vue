<template>
    <div>
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl font-semibold">Faqs</h1>
            <button type="button"
                  @click="showAddNewModal()"
                  class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:text-black hover:bg-white focus:outline-none"
                  >
                  Add new Faq
            </button>
        </div>
        <FaqsTable @clickEdit="editFaq"/>
        <FaqModal v-model="showFaqModal" :faq="faqModel" @close="onModalClose"/>
    </div>
</template>

<script setup>
import {computed, ref} from "vue";
import store from "../../store";
import FaqsTable from "./FaqsTable.vue";
import FaqModal from "./FaqModal.vue";

const DEFAULT_FAQ = {
    id:'',
    question: '',
    answer: '',
    published: ''
}

const faqs = computed(() => store.state.faqs);

const faqModel = ref({...DEFAULT_FAQ});
const showFaqModal = ref(false);

function showAddNewModal(){
    showFaqModal.value = true
}

function editFaq(f){
    store.dispatch('getFaq', f.id)
    .then(({data}) => {
        faqModel.value = data
        showAddNewModal(); 
    })
}

function onModalClose(){
    faqModel.value = {...DEFAULT_FAQ}
}

</script>