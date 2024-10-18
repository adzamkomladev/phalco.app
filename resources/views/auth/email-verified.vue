<script setup lang="ts">
import congratulation from "~/resources/svg/auth/congratulations.svg?url";

useHead({
    title: "Email Verified",
});
</script>

<template layout="auth">
    <LayoutAuthContent
        title="Congratulations"
        description="Your email has been successfully verified, Lets get started"
        :pageImage="congratulation"
    >
        <router-link :href="route('home')">
            <SharedFormSubmitButton text="Proceed" />
        </router-link>

        <p
            class="text-sm sm:landscape:text-left text-gray-600 xl:text-base dark:text-neutral-400"
        >
            Need help ?
            <router-link
                class="text-primary-300 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
            >
                Contact customer Support
            </router-link>
        </p>
    </LayoutAuthContent>
</template>
