<template>
    <div>
        <div class="flex justify-between mb-3">
            <h1 class="text-3xl font-semibold">Skills</h1>
            <button type="button"
                  @click="showAddNewModal()"
                  class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:text-black hover:bg-white focus:outline-none"
                  >
                  Add new image
            </button>
        </div>
        <SkillsTable @clickEdit="editSkill"/>
        <SkillModal v-model="showSkillModal" :skill="skillModel" @close="onModalClose"/>
    </div>
</template>

<script setup>
import {computed, ref} from "vue";
import store from "../../store";
import SkillsTable from "./SkillsTable.vue";
import SkillModal from "./SkillModal.vue";

const DEFAULT_SKILL = {
    id:'',
    image: '',
    name: '',
    published: '',
}

const skills = computed(() => store.state.skills);

const skillModel = ref({...DEFAULT_SKILL});
const showSkillModal = ref(false);

function showAddNewModal(){
    showSkillModal.value = true
}

function editSkill(s){
    store.dispatch('getSkill', s.id)
    .then(({data}) => {
        skillModel.value = data
        showAddNewModal(); 
    })
}

function onModalClose(){
    skillModel.value = {...DEFAULT_SKILL}
}

</script>