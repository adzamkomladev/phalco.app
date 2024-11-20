<script setup lang="ts">
useHead({
    title: "Register ",
});

const register = useForm({
    method: "POST",
    url: route("register"),
    fields: {
        first_name: "",
        last_name: "",
        email: "",
        password: "",
        password_confirmation: "",
        agree: false,
    },
});
</script>

<template layout="auth">
    <LayoutAuthContent
        class=""
        title="Sign Up"
        description="Create a new account with Phalco"
    >
        <div>
            <AuthGoogleButton text="Sign Up with google" />
        </div>

        <SharedCommonOr />

        <form @submit.prevent="register.submit">
            <div class="grid gap-y-4 sm:gap-y-6 pt-2">
                <div
                    class="grid grid-flow-row portrait:grid-flow-row md:grid-flow-col gap-4 sm:gap-6 w-full"
                >
                    <SharedFormBaseInput
                        v-model="register.fields.first_name"
                        :error="register.errors.first_name"
                        id="first_name"
                        name="first_name"
                        type="text"
                        placeholder="First Name"
                        extraClass=" hidden"
                    />
                    <SharedFormBaseInput
                        v-model="register.fields.last_name"
                        :error="register.errors.last_name"
                        id="last_name"
                        name="last_name"
                        type="text"
                        placeholder="Last Name"
                    />
                </div>

                <SharedFormBaseInput
                    v-model="register.fields.email"
                    :error="register.errors.email"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email address"
                />

                <SharedFormBaseInput
                    v-model="register.fields.password"
                    :error="register.errors.password"
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                />

                <SharedFormBaseInput
                    v-model="register.fields.password_confirmation"
                    :error="register.errors.password_confirmation"
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    placeholder="Confirm Password"
                />

                <!-- <SharedFormBaseCheckbox
                    v-model="register.fields.agree"
                    id="agree"
                    name="agree"
                    label="I accept the Terms and Conditions"
                /> -->
                <div class="py-3">
                    <SharedFormSubmitButton
                        :loading="register.processing"
                        text="Sign  Up"
                    />
                </div>
            </div>
        </form>
        <div class="">
            <p
                class="mt-3 text-sm sm:text-base text-black font-medium dark:text-gray-400"
            >
                Already have an account ?
                <router-link
                    class="text-primary-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                    :href="route('login')"
                >
                    Login
                </router-link>
            </p>
        </div>
    </LayoutAuthContent>
</template>
