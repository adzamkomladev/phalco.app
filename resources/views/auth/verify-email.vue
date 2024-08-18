<script setup lang="ts">
import useSecurity from "~/resources/composables/security";

useHead({
    title: "Verify Email",
});

const { user } = useSecurity();

const showResend = ref(true);
const resMessage = ref("");

const resend = async () => {
    const res = await router.post(route("verification.send"));

    if (res.response) {
        showResend.value = false;
        resMessage.value = res.response.data.view.properties.flash.success;

        setTimeout(() => {
            showResend.value = true;
        }, 30_000);
    }
};
</script>

<template layout="auth">
    <div
        class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="p-4 sm:p-7">
            <Transition name="fade">
                <div
                    v-if="!showResend"
                    id="dismiss-alert"
                    class="mb-3 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                    role="alert"
                    tabindex="-1"
                    aria-labelledby="hs-dismiss-button-label"
                >
                    <div class="flex">
                        <div class="shrink-0">
                            <svg
                                class="shrink-0 size-4 mt-0.5"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path
                                    d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"
                                ></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </div>
                        <div class="ms-2">
                            <h3
                                id="hs-dismiss-button-label"
                                class="text-sm font-medium"
                            >
                                {{ resMessage }}
                            </h3>
                        </div>
                        <div class="ps-3 ms-auto">
                            <div class="-mx-1.5 -my-1.5">
                                <button
                                    type="button"
                                    class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100 dark:bg-transparent dark:text-teal-600 dark:hover:bg-teal-800/50 dark:focus:bg-teal-800/50"
                                    data-hs-remove-element="#dismiss-alert"
                                >
                                    <span class="sr-only">Dismiss</span>
                                    <svg
                                        class="shrink-0 size-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path d="M18 6 6 18"></path>
                                        <path d="m6 6 12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </Transition>

            <div class="text-center">
                <h1
                    class="block text-2xl font-bold text-gray-800 dark:text-white"
                >
                    Verify your email
                </h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                    We've sent a link to your email address:
                    <strong class="font-bold">{{ user?.email }}</strong>
                    <br />
                    Please follow the link inside to continue.
                </p>
                <Transition name="fade">
                    <p v-if="showResend" class="mt-3 flex justify-center">
                        <span
                            class="text-sm text-gray-600 dark:text-neutral-400"
                        >
                            Didn't receive the email?
                        </span>
                        <span
                            class="cursor-pointer ms-2 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500 flex items-center"
                            @click="resend()"
                        >
                            Resend
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="0.75"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-chevron-right"
                            >
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </span>
                    </p>
                </Transition>
            </div>
        </div>
    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
