<script setup lang="ts">
const verifyOtp = {}

const handleOtpUpdate = (otp: string) => {
    console.log("OTP from child:", otp);
};
</script>

<template layout="auth">
    <LayoutAuthContent class="" title="Phone Verification" description="">
        <div class="text-gray-500 text-base   text-center sm:landscape:text-left -mt-5 md:text-xl">
            Enter the 4 digit verification sent to : <br class="hidden portrait:block">
            <strong class="text-primary-500 dark:text-primary-700 pr-1 truncate">
                +233 345 540 643
            </strong>
            to verify
        </div>
        <form >
            <div class="grid gap-y-8 mt-5 ">
               <SharedFormBaseOtp :length="4"  @updateOtp="handleOtpUpdate"/>

                <SharedFormSubmitButton
                :loading="false"
                    text="Confirm"

                />

            </div>
        </form>

        <div class="">
            <p class="mt-2 text-sm sm:text-base xl:text-lg text-gray-600  dark:text-neutral-400">
                Need help?
                <router-link
                    class="text-primary-300 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-primary-500"
                    :href="route('register')"
                >
                    Contact customer Support
                </router-link>
            </p>
        </div>
    </LayoutAuthContent>
</template>
