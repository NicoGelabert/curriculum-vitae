<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="flex items-center justify-between mb-3">
    <h1 v-if="!loading" class="text-3xl font-semibold">
      {{ education.id ? `Update education: "${education.title}"` : 'Create new Education' }}
    </h1>
  </div>
  <div class="bg-white rounded-lg shadow animate-fade-in-down">
    <Spinner v-if="loading"
              class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center z-50"/>
    <form v-if="!loading" @submit.prevent="onSubmit">
      <div class="grid grid-cols-3">
        <div class="col-span-2 px-4 pt-5 pb-4">
          <div class="flex flex-col gap-2">
            <h3 class="text-lg font-bold">Education Name</h3>
            <CustomInput class="mb-2" v-model="education.title" label="Education Title" :errors="errors['title']"/>
          </div>
          <hr class="my-4">
          <div class="flex flex-col gap-2">
            <h3 class="text-lg font-bold">Timelapse</h3>
            <CustomInput class="mb-2" v-model="education.timelapse" label="Timelapse" :errors="errors['timelapse']"/>
          </div>
          <div class="flex flex-col gap-2">
            <h3 class="text-lg font-bold">School</h3>
            <CustomInput class="mb-2" v-model="education.school" label="School" :errors="errors['school']"/>
          </div>
          <div class="flex flex-col gap-2">
            <h3 class="text-lg font-bold">Site</h3>
            <CustomInput class="mb-2" v-model="education.site" label="Site" :errors="errors['site']"/>
          </div>
          <hr class="my-4">
          <div class="flex flex-col gap-2">
            <h3 class="text-lg font-bold">Description</h3>
            <CustomInput type="richtext" class="mb-2" v-model="education.description" label="Description" :errors="errors['description']"/>
          </div>
          <div class="flex flex-col gap-2">
            <h3 class="text-lg font-bold">Certificate</h3>
            <CustomInput class="mb-2" v-model="education.certificate" label="Certificate" :errors="errors['certificate']"/>
          </div>
          <div class="flex flex-col gap-2">
            <h3 class="text-lg font-bold">Skills</h3>
            <CustomInput class="mb-2" v-model="education.skills" label="Skills" :errors="errors['skills']"/>
          </div>
        </div>
        <div class="col-span-1 px-4 pt-5 pb-4">
          <image-preview v-model="education.images"
                          :images="education.images"
                          v-model:deleted-images="education.deleted_images"
                          v-model:image-positions="education.image_positions"/>
        </div>
      </div>
      <footer class="bg-gray-50 rounded-b-lg px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="submit"
                class="bg-black text-base font-medium text-white border rounded-md border-gray-300 shadow-sm w-full inline-flex justify-center mt-3 px-4 py-2 hover:bg-black/10 hover:text-black focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-black sm:w-auto sm:mt-0 sm:ml-3 sm:text-sm">
          Save
        </button>
        <button type="button"
                @click="onSubmit($event, true)"
                class="bg-black text-base font-medium text-white border rounded-md border-gray-300 shadow-sm w-full inline-flex justify-center mt-3 px-4 py-2 hover:bg-black/10 hover:text-black focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-black sm:w-auto sm:mt-0 sm:ml-3 sm:text-sm">
          Save & Close
        </button>
        <router-link :to="{name: 'app.educations'}"
                      class="bg-white text-base font-medium text-gray-700 border rounded-md border-gray-300 shadow-sm w-full inline-flex justify-center mt-3 px-4 py-2 hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-gray-300 sm:w-auto sm:mt-0 sm:ml-3 sm:text-sm"
                      ref="cancelButtonRef">
          Cancel
        </router-link>
      </footer>
    </form>
  </div>
</template>
  
<script setup>
import {onMounted, ref} from 'vue'
import CustomInput from "../../components/core/CustomInput.vue";
import store from "../../store/index.js";
import Spinner from "../../components/core/Spinner.vue";
import {useRoute, useRouter} from "vue-router";
import ImagePreview from "../../components/ImagePreview.vue";
import {PlusCircleIcon, TrashIcon} from '@heroicons/vue/24/solid';
// import the component
import Treeselect from 'vue3-treeselect'
// import the styles
import 'vue3-treeselect/dist/vue3-treeselect.css'
import axiosClient from "../../axios.js";

const route = useRoute()
const router = useRouter()

const education = ref({
  id: null,
  title: null,
  timelapse: '',
  school: '',
  site: '',
  description: '',
  certificate: '',
  skills: '',
  images: [],
  deleted_images: [],
  image_positions: {},
})

console.log(education.prices)
const errors = ref({});

const loading = ref(false);

const emit = defineEmits(['update:modelValue', 'close'])

onMounted(() => {
  if (route.params.id) {
    loading.value = true
    store.dispatch('getEducation', route.params.id)
      .then((response) => {
        loading.value = false;
        education.value = response.data;
      })
  }
})

function onSubmit($event, close = false) {
  loading.value = true
  errors.value = {};
  if (education.value.id) {
    store.dispatch('updateEducation', education.value)
      .then(response => {
        loading.value = false;
        if (response.status === 200) {
          education.value = response.data
          store.commit('showToast', 'Education was successfully updated');
          store.dispatch('getEducations')
          if (close) {
            router.push({name: 'app.educations'})
          }
        }
      })
      .catch(err => {
        loading.value = false;
        errors.value = err.response.data.errors
      })
  } else {
    store.dispatch('createEducation', education.value)
      .then(response => {
        loading.value = false;
        if (response.status === 201) {
          education.value = response.data
          store.commit('showToast', 'Education was successfully created');
          store.dispatch('getEducations')
          if (close) {
            router.push({name: 'app.educations'})
          } else {
            education.value = response.data
            router.push({name: 'app.educations.edit', params: {id: response.data.id}})
          }
        }
      })
      .catch(err => {
        loading.value = false;
        errors.value = err.response.data.errors
      })
  }
}
</script>
  