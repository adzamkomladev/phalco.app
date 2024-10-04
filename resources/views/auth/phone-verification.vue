<script setup lang="ts">
// Set up the form
const register = useForm({
    method: "POST",
    url: route("password.reset"),
    fields: {
        otp: "", // Combine OTP digits later
        password: "",
        password_confirmation: "",
    },
    hooks: {
        start: () => console.log("The request has started."),
        fail: () => console.log("The request has failed."),
        after: () => console.log("The request has finished."),
        success: () => console.log("The request has succeeded."),
    },
});

// OTP handling logic
const otp = reactive(Array(4).fill(""));

// Input and DOM manipulation methods
const handleInput = (index: number, event: Event) => {
    const input = (event.target as HTMLInputElement).value;
    otp[index] = input;

    if (input && index < otp.length - 1) {
        const nextInput =
            document.querySelectorAll<HTMLInputElement>("#otp-form input")[
                index + 1
            ];
        nextInput?.focus();
    }

    register.fields.otp = otp.join("");
};

const handleKeyDown = (event: KeyboardEvent, index: number) => {
    const key = event.key;
    if (
        !/^[0-9]{1}$/.test(key) &&
        key !== "Backspace" &&
        key !== "Delete" &&
        key !== "Tab" &&
        !event.metaKey
    ) {
        event.preventDefault();
    }

    if (
        (key === "Backspace" || key === "Delete") &&
        index > 0 &&
        otp[index] === ""
    ) {
        const prevInput =
            document.querySelectorAll<HTMLInputElement>("#otp-form input")[
                index - 1
            ];
        prevInput?.focus();
    }
};

const handleFocus = (event: FocusEvent) => {
    const target = event.target as HTMLInputElement;
    target.select();
};

const handlePaste = (event: ClipboardEvent) => {
    event.preventDefault();

    const pastedText = event.clipboardData?.getData("text") || "";
    const sanitizedText = pastedText.replace(/\D/g, "").slice(0, otp.length);

    if (sanitizedText.length === otp.length) {
        sanitizedText.split("").forEach((char, i) => {
            otp[i] = char;
        });

        document
            .querySelectorAll<HTMLInputElement>("#otp-form input")
            .forEach((input, i) => {
                input.value = otp[i];
            });

        const lastInput =
            document.querySelectorAll<HTMLInputElement>("#otp-form input")[
                sanitizedText.length - 1
            ];
        lastInput?.focus();

        register.fields.otp = otp.join("");
    }
};
</script>

<template layout="auth">
    <AuthInnerLayout class="" title="Phone Verification" description="">
        <div class="text-gray-500 flex -mt-5">
            Enter the 4 digit verification sent to :
            <div class="text-primary-500 dark:text-primary-700 pr-1">
                +233 345 540 643
            </div>
            <p>to verify</p>
        </div>
        <form @submit.prevent="register.submit">
            <div class="grid gap-y-8 pt-2">
                <div class="grid place-content-center pt-4">
                    <div id="otp-form" class="flex gap-2">
                        <input
                            v-for="(digit, index) in otp"
                            :key="index"
                            type="text"
                            maxlength="1"
                            class="shadow-xs flex w-16 h-20 items-center justify-center rounded-lg border border-gray-200 border-stroke bg-gray-100 p-2 text-center text-2xl font-medium text-gray-500 outline-none sm:text-4xl dark:bg-gray-700"
                            v-model="otp[index]"
                            @input="handleInput(index, $event)"
                            @keydown="handleKeyDown($event, index)"
                            @focus="handleFocus($event)"
                            @paste="handlePaste($event)"
                        />
                    </div>
                </div>

                <SharedFormSubmitButton
                    :isLoading="register.processing"
                    text="Verify OTP"
                />
            </div>
        </form>

        <div class="">
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                Need help?
                <router-link
                    class="text-primary-300 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-primary-500"
                    :href="route('register')"
                >
                    Contact customer Support
                </router-link>
            </p>
        </div>
    </AuthInnerLayout>
</template>
