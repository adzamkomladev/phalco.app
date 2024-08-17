<script setup lang="ts">
import useSecurity from '~/resources/composables/security';

useHead({
    title: "Login",
});

const { csrfToken } = useSecurity();

const login = useForm({
    method: "POST",
    url: route("login"),
    fields: {
        email: "",
        password: "",
        remember: false,
        // _token: csrfToken.value,
    },
    hooks: {
		start: () => console.log('The request has started.'),
		fail: () => console.log('The request has failed.'),
        after: () => console.log('The request has finished.'),
        success: () => console.log('The request has succeeded.'),
	}
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

            </div>

            <div class="mt-5">
                <!-- Form -->
                <form  @submit.prevent="login.submit">
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
                            Login
                        </button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</template>
