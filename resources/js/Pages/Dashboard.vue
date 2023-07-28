<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const submissions = [
    {
        id: 1,
        status: 'active',
        created_at: '2023-08-22 18:00:01',
        updated_at: '2023-08-22 18:00:01',
        phase: {
            title: "Master one"
        }
    },
    {
        id: 5,
        status: 'in progress',
        created_at: '2023-08-22 18:00:01',
        updated_at: '2023-08-22 18:00:01',
        phase: {
            title: "Master five"
        }
    },
    {
        id: 2,
        status: 'writing',
        created_at: '2023-08-22 18:00:01',
        updated_at: '2023-08-22 18:00:01',
        phase: {
            title: "Master two"
        }
    },
    {
        id: 3,
        status: 'interview',
        created_at: '2023-08-22 18:00:01',
        updated_at: '2023-08-22 18:00:01',
        phase: {
            title: "Master three"
        }
    },
    {
        id: 4,
        status: 'rejected',
        created_at: '2023-08-22 18:00:01',
        updated_at: '2023-08-22 18:00:01',
        phase: {
            title: "Master four"
        }
    },
]


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900">1</div> -->
                    <table class="mt-6 border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th
                                    class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                    Candidature</th>
                                <th
                                    class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                    Created</th>
                                <th
                                    class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                    Updated</th>
                                <th
                                    class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                    Status</th>
                                <th
                                    class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-slate-800">
                            <tr v-if="submissions.length == 0">
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 text-center"
                                    colspan="5">
                                    No submission is found !</td>
                            </tr>
                            <tr v-if="submissions.length > 0" v-for="submission in submissions" :key="submission.id">
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ submission.phase.title }}
                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ submission.created_at }}
                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ submission.updated_at }}
                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 items-start">
                                    <span v-if="submission.status == 'in progress'"
                                        class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{
                                            submission.status }}</span>
                                    <span v-if="submission.status == 'active'"
                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{
                                            submission.status }}</span>
                                    <span v-if="submission.status == 'writing'"
                                        class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">{{
                                            submission.status }}</span>
                                    <span v-if="submission.status == 'interview'"
                                        class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">{{
                                            submission.status }}</span>
                                    <span v-if="submission.status == 'rejected'"
                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">{{
                                            submission.status }}</span>
                                </td>
                                <td
                                    class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    <button
                                        class="bg-white hover:bg-gray-100 text-gray-800 py-1 px-2 border border-gray-400 rounded">
                                        Edit
                                    </button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
