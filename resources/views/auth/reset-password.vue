<script setup lang="ts">
useHead({
    title: "Forget Password",
});

const form = useForm({
    method: "POST",
    url: route("password.reset"),
    fields: {
        password: "",
        password_confirmation: "",
    },

    hooks: {
        success: () => form.reset(),
    },
});
</script>

<template layout="auth">
    <LayoutAuthContent
        class=""
        title="Reset Password"
        description="Enter new password to continue with phalco"
    >
        <form @submit.prevent="form.submit">
            <div class="grid gap-y-4 _md:landscape:gap-y-4 sm:gap-y-8 pt-2">
                <SharedFormBaseInput
                    v-model="form.fields.password"
                    :error="form.errors.password"
                    id="password"
                    name="password"
                    type="password"
                    placeholder="New Password"
                />

                <SharedFormBaseInput
                    v-model="form.fields.password_confirmation"
                    :error="form.errors.password_confirmation"
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    placeholder="Re-enter Password"
                />

                <SharedFormSubmitButton
                    :loading="form.processing"
                    text="Proceed"
                />
            </div>
        </form>
    </LayoutAuthContent>
</template>
