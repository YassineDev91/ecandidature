<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';


const user = usePage().props.auth.user;

const form = useForm({
    firstname: user.firstname,
    lastname: user.lastname,
    nationality: '',
    adress:'',
    dob:'',
    gender: 'male',
    email: user.email,
});

</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Personal Information</h2>
            <p class="mt-1 text-sm text-gray-600">
                Complete your personal information
            </p>
        </header>

        <form @submit.prevent="form.patch(route('submission.personal_information'))" class="mt-6 space-y-6">

            <div class="mt-2 space-y-6">
                <InputLabel for="gender" value="Gender" />
                <div class="flex items-start gap-x-5">
                    <div class="flex items-center gap-x-3">
                        <input id="male" type="radio" value="male"
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" v-model="form.gender" />
                        <label for="male" class="block text-sm font-medium leading-6 text-gray-900">Male</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input id="female" name="gender" type="radio" value="female"
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" v-model="form.gender" />
                        <label for="female" class="block text-sm font-medium leading-6 text-gray-900">Female</label>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
            <div class="col">
                <InputLabel for="firstname" value="Firstname" />
                <TextInput id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname" required
                    autocomplete="firstname" />
                <InputError class="mt-2" :message="form.errors.firstname" />
            </div>

            <div>
                <InputLabel for="lastname" value="Lastname" />
                <TextInput id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" required
                    autocomplete="lastname" />
                <InputError class="mt-2" :message="form.errors.lastname" />
            </div>

            <div>
                <InputLabel for="dob" value="Date of birth" />
                <TextInput id="dob" type="date" class="mt-1 block w-full" v-model="form.dob" required autocomplete="dob" />
                <InputError class="mt-2" :message="form.errors.dob" />
            </div>

            <div>
                <InputLabel for="birth_city" value="Birth City" />
                <select id="country" name="country" autocomplete="country-name" required
                    class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full">
                    <option option="kenitra">Kenitra</option>
                    <option option="rabat">Rabat</option>
                    <option option="casablanca">Casablanca</option>
                </select>
                <InputError class="mt-2" :message="form.errors.birth_city" />
            </div>

            <div class="col-span-2">
                <InputLabel for="email" value="Email" />
                <TextInput type="email" v-model="form.email" class="mt-1 block w-full text-gray-500 bg-gray-300" disabled/>
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="col-span-2">
                <InputLabel for="city" value="City" />
                <select id="country" name="country" autocomplete="country-name"
                    class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full" required>
                    <option option="kenitra">Kenitra</option>
                    <option option="rabat">Rabat</option>
                    <option option="casablanca">Casablanca</option>
                </select>
                <InputError class="mt-2" :message="form.errors.city" />
            </div>

            <div class="col-span-2">
                <InputLabel for="adress" value="Adress" />
                <TextInput type="text" class="mt-1 w-full block" v-model="form.adress" required/>
                <InputError class="mt-2" :message="form.errors.adress" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Next -></PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Next -></p>
                </Transition>
            </div>
        </div>
        </form>
    </section>
</template>
