<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import PersonalInformation from '@/Pages/Submission/Partials/PersonalInformation.vue'
import { Head } from '@inertiajs/vue3';
import DiplomaInformation from '@/Pages/Submission/Partials/DiplomaInformation.vue'
import ScoreInformation from '@/Pages/Submission/Partials/ScoreInformation.vue'
import Steps from '@/Pages/Submission/Partials/Steps.vue'
import { ref } from 'vue';


</script>
<template>
    <Head title="Submission" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Submission</h2>

        </template>
        <div class="py-12">
            <div class="py-5 max-w-6xl mx-auto sm:px-6 lg:px-8 ">
                <Steps :step="$page.props.step"></Steps>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y6">

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" v-if="$page.props.step == 1">
                    <PersonalInformation class="max-w-xl"></PersonalInformation>
                </div>

                <div class="mb-4 p-4 sm:p-8 bg-white shadow sm:rounded-lg" v-if="$page.props.step == 2">
                    <DiplomaInformation class="max-w-xl"></DiplomaInformation>
                </div>

                <div class="mb-4 p-4 sm:p-8 bg-white shadow sm:rounded-lg" v-if="$page.props.step == 3">
                    <ScoreInformation></ScoreInformation>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>



<style></style>