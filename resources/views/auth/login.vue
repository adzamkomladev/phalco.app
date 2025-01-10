<script setup lang="ts">
useHead({
    title: "Login",
});

const form = useForm({
    method: "POST",
    url: route("login"),
    fields: {
        email: "",
        password: "",
        remember: false,
    },
    hooks: {
        success: () => form.reset(),
    },
});
</script>

<template layout="auth">
    <LayoutAuthContent
        class=""
        title="Login"
        description="Login to continue with Phalco"
    >
        <div>
            <AuthGoogleButton text="Log In with Google" />
        </div>

        <SharedCommonOr />

        <form @submit.prevent="form.submit">
            <div class="grid gap-y-4 sm:gap-y-6 pt-2">
                <SharedFormBaseInput
                    v-model="form.fields.email"
                    :error="form.errors.email"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email Address"
                />
                <div>
                    <SharedFormBaseInput
                        v-model="form.fields.password"
                        :error="form.errors.password"
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password"
                    />
                    <p class="text-sm text-right p-1">
                        <router-link
                            class="text-primary-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                            :href="route('password.reset')"
                        >
                            Forgot password?
                        </router-link>
                    </p>
                </div>

                <SharedFormSubmitButton
                    :loading="form.processing"
                    text="Login"
                />
            </div>
        </form>
        <div class="">
            <p class="mt-5 text-sm text-black font-medium dark:text-gray-400">
                Not registered yet ?
                <router-link
                    class="text-primary-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                    :href="route('register')"
                >
                    Create an account
                </router-link>
            </p>
        </div>
    </LayoutAuthContent>
</template>
