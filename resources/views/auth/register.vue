<script setup lang="ts">
useHead({
    title: "Register",
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
    hooks: {
        start: () => console.log("The request has started."),
        fail: () => console.log("The request has failed."),
        after: () => console.log("The request has finished."),
        success: () => console.log("The request has succeeded."),
    },
});
</script>

<template layout="auth">
    <AuthInnerLayout
        class=""
        title="Register"
        description="Create new account with phalco"
    >
        <div>
            <AuthGoogleButton />
        </div>

        <div
            class="py-3 flex items-center text-gray-400 text-base uppercase before:flex-1 before:border-t-2 before:border-gray-200 before:me-6 after:flex-1 after:border-t-2 after:border-gray-200 after:ms-6 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600"
        >
            Or
        </div>

        <form @submit.prevent="register.submit">
            <div class="grid gap-y-5">
                <div class="grid grid-flow-col gap-x-5 w-full">
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

                <SharedFormBaseCheckbox
                    v-model="register.fields.agree"
                    id="agree"
                    name="agree"
                    label="I accept the Terms and Conditions"
                />

                <SharedFormSubmitButton
                    :isLoading="register.processing"
                    text="Login"
                />
            </div>
        </form>
        <div class="text-center">
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                Already have anaccount ?
                <router-link
                    class="text-primary-twi decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                    :href="route('login')"
                >
                    Login
                </router-link>
            </p>
        </div>
    </AuthInnerLayout>
</template>

<!--  <div
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

                <form @submit.prevent="register.submit">
                    <div class="grid gap-y-4">
                        <SharedFormBaseInput
                            v-model="register.fields.first_name"
                            :error="register.errors.first_name"
                            id="first_name"
                            name="first_name"
                            type="text"
                            label="First Name"
                        />
                        <SharedFormBaseInput
                            v-model="register.fields.last_name"
                            :error="register.errors.last_name"
                            id="last_name"
                            name="last_name"
                            type="text"
                            label="Last Name"
                        />
                        <SharedFormBaseInput
                            v-model="register.fields.email"
                            :error="register.errors.email"
                            id="email"
                            name="email"
                            type="email"
                            label="Email address"
                        />

                        <SharedFormBaseInput
                            v-model="register.fields.password"
                            :error="register.errors.password"
                            id="password"
                            name="password"
                            type="password"
                            label="Password"
                        />

                        <SharedFormBaseInput
                            v-model="register.fields.password_confirmation"
                            :error="register.errors.password_confirmation"
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            label="Confirm Password"
                        />

                        <SharedFormBaseCheckbox
                            v-model="register.fields.agree"
                            id="agree"
                            name="agree"
                            label="I accept the Terms and Conditions"
                        />

                        <button
                            type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        >
                            <span
                                v-if="register.processing"
                                class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                                role="status"
                                aria-label="loading"
                            ></span>
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
