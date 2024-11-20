<script setup lang="ts">
const verifyOtp = {};

const handleOtpUpdate = (otp: string) => {
    console.log("OTP from child:", otp);
};

const form = useForm({
    method: "POST",
    url: route("elections.store"),
    fields: {
        otp: "",
    },
});
</script>

<template layout="auth">
    <LayoutAuthContent class="" title="Phone Verification" description="">
        <template v-slot:description>
            <div class="mt-3">
                Enter the 6 digit verification sent to :
                <strong
                    class="text-primary-500 dark:text-primary-700 pr-1 truncate"
                >
                    +233 345 540 643
                </strong>
                to verify
            </div>
        </template>

        <form @submit.prevent="form.submit">
            <div class="grid gap-8 w-full py-4">
                <!-- <SharedFormBaseOtp :length="4" @updateOtp="handleOtpUpdate" /> -->
                <SharedFormBaseOtpInput
                    v-model="form.fields.otp"
                    name="otp"
                    :length="4"
                    :error="form.errors.otp"
                />

                <SharedFormSubmitButton
                    :loading="form.processing"
                    text="Confirm"
                />
            </div>
        </form>
        <div class="">
            <p
                class="mt-2 text-sm sm:text-base xl:text-lg text-black dark:text-gray-400"
            >
                Need help ?
                <router-link
                    class="text-primary-500 decoration-2 hover:underline focus:outline-none focus:underline font-mediu dark:text-primary-500"
                    :href="route('register')"
                >
                    Contact customer Support
                </router-link>
            </p>
        </div>
    </LayoutAuthContent>
</template>
