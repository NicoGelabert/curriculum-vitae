<template>
  <div>
      <div class="flex justify-between mb-3">
          <h1 class="text-3xl font-semibold">Educación</h1>
          <router-link :to="{name: 'app.educations.create'}"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:text-black hover:bg-white focus:outline-none"
          >
          Add New
          </router-link>
      </div>
      <EducationsTable/>
  </div>

</template>

<script setup>
import {computed} from "vue";
import store from "../../store";
import EducationsTable from "./EducationsTable.vue";

const educations = computed(() => store.state.educations);
</script>