<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Dropdown from '@/Components/Dropdown.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { reactive } from 'vue';


const diplomas = reactive([
    {
        title: '',
        type: 'BAC',
        grade: '',
        year: '',
        scores: []
    },
    {
        title: '',
        type: 'BAC+2',
        grade: '',
        year: '',
        scores:
            [
                {
                    title: 'S1',
                    score: 0
                },
                {
                    title: 'S2',
                    score: 0
                },
                {
                    title: 'S3',
                    score: 0
                },
                {
                    title: 'S4',
                    score: 0
                },
            ]
    },

]);


</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Scores Information</h2>
            <p class="mt-1 text-sm text-gray-600">
                Enter your scores information
            </p>
        </header>

        <form @submit.prevent="form.patch(route('submission.personal_information'))" class="mt-6 space-y-6">

            <div class="mt-2 space-y-6">
                <div v-for="diploma in diplomas" :key="diploma.title">
                    <div v-for="score in diploma.scores" :key="score.title" class="mt-3">
                        <InputLabel for="score.title" :value="score.title" />
                        <TextInput type="number" min="0" max="20" step=".001" v-model="score.score" class="mt-1" />
                    </div>
                </div>
            </div>

        </form>
    </section>
</template>
