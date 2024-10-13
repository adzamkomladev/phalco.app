<script setup lang="ts">
import emailVerifiedImage from "~/resources/svg/auth/congratulations.svg";

useHead({
    title: "Email Verified",
});
</script>

<template layout="auth">
    <div class="grid grid-flow-row gap-5">
        <div class="text-center sm:landscape:text-left">
            <div
                class="text-black dark:text-primary-700 font-black text-2xl sm:text-3xl 2xl:text-4xl flex flex-row gap-8 items-center justify-center sm:landscape:justify-start md:text-3xl xl:text-4xl"
            >
                <div>Congratulations</div>
            </div>
        </div>
    </div>
    <div>
        <p
            class="text-gray-500 text-center sm:landscape:text-left font-normal text-sm sm:text-base md:text-lg xl:text-xl"
        >
            Your email has been successfully verified, Lets get started
        </p>
        <div class="grid justify-center dark:opacity-70 py-8">
            <img :src="emailVerifiedImage" class="h-48" />
        </div>

        <router-link :href="route('home')">
            <SharedFormSubmitButton text="Proceed" />
        </router-link>

        <div class="">
            <p
                class="text-sm sm:landscape:text-left text-gray-600 xl:text-base dark:text-neutral-400"
            >
                Need help ?
                <router-link
                    class="text-primary-300 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                >
                    Contact customer Support
                </router-link>
            </p>
        </div>
    </div>
</template>
