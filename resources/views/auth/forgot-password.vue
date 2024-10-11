<script setup lang="ts">
useHead({
    title: "Forget Password",
});

const forget_password = useForm({
    method: "POST",
    url: route("password.request"),
    fields: {
        email: "",
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
        title="Forget Password"
        description="Enter your email to reset your password "
    >
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
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Remember your password?
                    <a
                        class="text-primary-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="../examples/html/signin.html"
                    >
                        Sign in here
                    </a>
                </p>
            </div>
        </form>
    </LayoutAuthContent>
</template>

<!--  <div
        class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-neutral-900 dark:border-neutral-700"
    >
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1
                    class="block text-2xl font-bold text-gray-800 dark:text-white"
                >
                    Forgot password?
                </h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    Remember your password?
                    <a
                        class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                        href="../examples/html/signin.html"
                    >
                        Sign in here
                    </a>
                </p>
            </div>

            <div class="mt-5">
                <form>
                    <div class="grid gap-y-4">
                        <div>
                            <label
                                for="email"
                                class="block text-sm mb-2 dark:text-white"
                                >Email address</label
                            >
                            <div class="relative">
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    required
                                    aria-describedby="email-error"
                                />
                                <div
                                    class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3"
                                >
                                    <svg
                                        class="size-5 text-red-500"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        viewBox="0 0 16 16"
                                        aria-hidden="true"
                                    >
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <p
                                class="hidden text-xs text-red-600 mt-2"
                                id="email-error"
                            >
                                Please include a valid email address so we can
                                get back to you
                            </p>
                        </div>

                        <button
                            type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        >
                            <span
                                class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                                role="status"
                                aria-label="loading"
                            ></span>
                            Reset password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
