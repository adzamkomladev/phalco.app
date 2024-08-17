<script setup lang="ts">
useHead({
    title: "Register",
});

const register = useForm({
    method: "POST",
    url: route("register"),
    fields: {
        email: "",
        password: "",
        password_confirmation: "",
        agree: false,
    },
    hooks: {
        start: () => console.log("The request has started."),
        fail: () => console.log("The request has failed."),
        after: () => console.log("The request has finished."),
        success: () => console.log("The request has succeeded."),
    },
});
</script>

<template layout="auth">
    <div
        class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1
                    class="block text-2xl font-bold text-gray-800 dark:text-white"
                >
                    Register
                </h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Already have an account?
                    <router-link
                        class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        :href="route('login')"
                    >
                        Sign in here
                    </router-link>
                </p>
            </div>

            <div class="mt-5">
                <AuthGoogleButton text="Sign up with Google" />
                <div
                    class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-600 dark:after:border-neutral-600"
                >
                    Or
                </div>

                <!-- Form -->
                <form @submit.prevent="register.submit">
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <SharedFormBaseInput
                            v-model="register.fields.email"
                            :error="register.errors.email"
                            id="email"
                            name="email"
                            type="email"
                            label="Email address"
                        />
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <SharedFormBaseInput
                            v-model="register.fields.password"
                            :error="register.errors.password"
                            id="password"
                            name="password"
                            type="password"
                            label="Password"
                        />

                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <SharedFormBaseInput
                            v-model="register.fields.password_confirmation"
                            :error="register.errors.password_confirmation"
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            label="Confirm Password"
                        />
                        <!-- End Form Group -->

                        <!-- Checkbox -->
                        <SharedFormBaseCheckbox
                            v-model="register.fields.agree"
                            id="agree"
                            name="agree"
                            label="I accept the Terms and Conditions"
                        />
                        <!-- End Checkbox -->

                        <button
                            type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        >
                            Register
                        </button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</template>
