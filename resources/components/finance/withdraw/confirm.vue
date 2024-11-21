<script setup lang="ts"></script>

<template>
    <div>
        <p class="font-semibold text-sm">Password</p>
        <p class="text-xs font-thin">
            Inset your account pin to proceed with withdrawal process
        </p>

        <form @submit.prevent="form.submit">
            <div class="grid gap-8 w-full py-4">
                <SharedFormBaseOtpInput
                    v-model="form.fields.otp"
                    name="otp"
                    :length="5"
                    :error="form.errors.otp"
                />

                <SharedFormSubmitButton
                    :loading="form.processing"
                    text="Withdraw"
                />
            </div>
        </form>
    </div>
</template>
