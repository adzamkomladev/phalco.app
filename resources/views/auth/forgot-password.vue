<script setup lang="ts">
import ForgetPasswordImage from "~/resources/svg/auth/forgot_password.svg?url";

useHead({
    title: "Forget Password",
});

const forget_password = useForm({
    method: "POST",
    url: route("password.request"),
    fields: {
        email: "",
    },
});
</script>

<template layout="auth">
    <LayoutAuthContent
        class=""
        title="Forget Password"
        description="Enter your email to reset your password "
    >
        <div class="grid place-items-center">
            <img class="w-1/2 py-2" :src="ForgetPasswordImage" />
        </div>
        <form @submit.prevent="forget_password.submit">
            <div class="grid gap-y-8 pt-2">
                <SharedFormBaseInput
                    v-model="forget_password.fields.email"
                    :error="forget_password.errors.email"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email"
                />

                <SharedFormSubmitButton
                    :loading="forget_password.processing"
                    text="Proceed"
                />
            </div>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                Remember your password?
                <router-link
                    class="text-primary-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                    :href="route('login')"
                >
                    Sign in here
                </router-link>
            </p>
        </form>
    </LayoutAuthContent>
</template>
