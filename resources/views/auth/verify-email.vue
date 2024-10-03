<script setup lang="ts">
import useSecurity from "~/resources/composables/security";

useHead({
    title: "Verify Email",
});

const ALLOW_RESEND_IN_SECONDS = 10;

const { user } = useSecurity();

const showResend = ref(true);
const resMessage = ref("");
const countdown = ref(ALLOW_RESEND_IN_SECONDS);

const resend = async () => {
    const res = await router.post(route("verification.send"));

    if (res.response) {
        showResend.value = false;
        resMessage.value = res.response.data.view.properties.flash.success;
        startCountdown();
    }
};

const startCountdown = () => {
    countdown.value = ALLOW_RESEND_IN_SECONDS;
    const interval = setInterval(() => {
        countdown.value -= 1;
        if (countdown.value <= 0) {
            clearInterval(interval);
            resMessage.value = "";
            showResend.value = true;
        }
    }, 1000);
};
</script>

<template layout="auth">
    <AuthInnerLayout class="" title="Verification email sent" description="">
        <div class="grid gap-5">
            <p>
                To start using Phalco, confirm your email address with the email
                we sent to:
                <strong class="font-bold text-primary-500">{{
                    user?.email
                }}</strong>
            </p>

            <div class="relative h-16">
                <Transition name="fade" appear mode="out-in">
                    <div
                        v-if="resMessage"
                        id="dismiss-alert"
                        class="absolute inset-0 mb-3 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500"
                        role="alert"
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
                                <h3 class="text-sm font-medium">
                                    {{ resMessage }} (You can resend in
                                    {{ countdown }} seconds)
                                </h3>
                            </div>
                        </div>
                    </div>
                </Transition>

                <Transition name="fade" appear mode="in-out">
                    <div class="absolute inset-0 mb-3">
                        <SharedFormSubmitButton
                            v-if="showResend"
                            @click="resend()"
                            class="absolute inset-0"
                            text="Resend Email"
                        />
                    </div>
                </Transition>
            </div>
        </div>
    </AuthInnerLayout>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease, transform 0.5s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(10px);
}
</style>
