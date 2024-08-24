<script setup lang="ts">
useHead({
    title: "Login",
});

const login = useForm({
    method: "POST",
    url: route("login"),
    fields: {
        email: "",
        password: "",
        remember: false,
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
                    Login
                </h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Don't have an account yet?
                    <router-link
                        class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        :href="route('register')"
                    >
                        Sign up here
                    </router-link>
                </p>
            </div>

            <div class="mt-5">
                <AuthGoogleButton />
                <div
                    class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-600 dark:after:border-neutral-600"
                >
                    Or
                </div>

                <!-- Form -->
                <form @submit.prevent="login.submit">
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <SharedFormBaseInput
                            v-model="login.fields.email"
                            :error="login.errors.email"
                            id="email"
                            name="email"
                            type="email"
                            label="Email address"
                        />
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <SharedFormBaseInput
                            v-model="login.fields.password"
                            :error="login.errors.password"
                            id="password"
                            name="password"
                            type="password"
                            label="Password"
                        />

                        <!-- End Form Group -->

                        <!-- Checkbox -->
                        <SharedFormBaseCheckbox
                            v-model="login.fields.remember"
                            id="remember"
                            name="remember"
                            label="Remember me"
                        />
                        <!-- End Checkbox -->

                        <button
                            type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        >
                            <span
                                v-if="login.processing"
                                class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                                role="status"
                                aria-label="loading"
                            ></span>

                            Login
                        </button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</template>
