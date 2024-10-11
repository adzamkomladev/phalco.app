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
    <LayoutAuthContent
        class=""
        title="Login"
        description="login to continue with Phalco"
    >
        <div>
            <AuthGoogleButton />
        </div>

             <SharedFormOr/>


        <form @submit.prevent="login.submit">
            <div class="grid gap-y-4">
                <SharedFormBaseInput
                    v-model="login.fields.email"
                    :error="login.errors.email"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email address"
                />

                <SharedFormBaseInput
                    v-model="login.fields.password"
                    :error="login.errors.password"
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                />
                <p class="text-sm text-right">
                    <router-link
                        class="text-primary-twi decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        :href="route('password.reset')"
                    >
                        forget password
                    </router-link>
                </p>

             
                <SharedFormSubmitButton
                    :loading="login.processing"
                    text="Login"
                />
            </div>
        </form>
        <div class="">
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                Not registere yet ?
                <router-link
                    class="text-primary-twi decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                    :href="route('register')"
                >
                    Create an account
                </router-link>
            </p>
        </div>
    </LayoutAuthContent>
</template>
