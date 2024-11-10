<script setup lang="ts">
import Congratulation from "~/resources/svg/auth/congratulations.svg?url";
useHead({ title: "Email Verified" });
</script>

<template layout="auth">
    <LayoutAuthContent
        title="Congratulations"
        :pageImage="Congratulation"
    >
           <template v-slot:description>
<div class="mt-4">
    our email has been successfully verified, Lets get started
</div>
           </template>

        <router-link :href="route('home')">
            <SharedFormSubmitButton text="Proceed" />
        </router-link>

        <p
            class="text-sm mt-4 sm:landscape:text-left text-black xl:text-base font-medium dark:text-gray-400"
        >
            Need help ?
            <router-link
                class="text-primary-500 hover:underline focus:outline-none focus:underline  dark:text-blue-500"
            >
                Contact customer Support
            </router-link>
        </p>
        <SharedAnimationConfetti :mountStart="true" />
    </LayoutAuthContent>
</template>
