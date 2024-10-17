<script setup lang="ts">
import congratulation from "~/resources/svg/auth/congratulations.svg";

useHead({
    title: "Email Verified",
});
</script>

<template layout="auth">
    <LayoutAuthContent
        title="Congratulations"
        decsription="Your email has been successfully verified, Lets get started"
    >
        <template v-slot:image>
            <img :src="congratulation" class="h-48" />
        </template>

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
    </LayoutAuthContent>
</template>
