<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Dropdown from '@/Components/Dropdown.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { reactive } from 'vue';


const user = usePage().props.auth.user;
const phase = {
    starts_at: '',
    finishs_at: '',
    required_semesters: 4
}

const form = useForm({
    'diplomas': [
        {
            title: '',
            type: 'BAC',
            grade: '',
            year: ''
        },
        {
            title: '',
            type: 'BAC+2',
            grade: '',
            year: ''
        },

    ]
});

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Diploma Information</h2>
            <p class="mt-1 text-sm text-gray-600">
                Enter your Diplomas information
            </p>
        </header>
        <form @submit.prevent="form.post(route('submission.diplomas_information'))" class="mt-6 space-y-6">

            <div class="mt-2 space-y-6" v-for="diploma in form.diplomas" :key="diploma.title">
                <p class="text-sm underline">{{ diploma.type }} information</p>
                <div>
                    <InputLabel for="title" value="Title" />
                    <select v-model="diploma.title"
                        class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full">
                        <option value="SP1">SP1</option>
                        <option value="SP2">SP2</option>
                        <option value="SP3">SP3</option>
                        <option value="other">other</option>
                    </select>
                    <TextInput type="text" class="mt-1 block w-full" v-model="diploma.title" v-if="diploma.title == 'other'"
                        value="" autofocus />
                </div>
                
                <div class="grid grid-cols-3 gap-3">
                    <div class="col-span-2">
                    <InputLabel for="grade" value="Grade" />
                    <select v-model="diploma.grade"
                        class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full">
                        <option value="P">Standard pass</option>
                        <option value="AB">Honours</option>
                        <option value="B">High honours</option>
                        <option value="TB">Highest honour</option>
                    </select>
                </div>

                <div class="col mt-1">
                    <InputLabel for="year" value="Year" />
                    <TextInput type="number" min="1990" :max="new Date().getFullYear()" v-model="diploma.year"  class="w-full"/>
                </div>
                </div>
                

                
            </div>
            <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Next -></PrimaryButton>

                    <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Next</p>
                    </Transition>
                </div>
        </form>
    </section>
</template>
