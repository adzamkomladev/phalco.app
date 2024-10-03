<script setup lang="ts">
useHead({
    title: "Forget Password",
});

const register = useForm({
    method: "POST",
    url: route("password.reset"),
    fields: {
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
</script>

<template layout="auth">
    <AuthInnerLayout
        class=""
        title="Reset Password"
        description="Enter your email to reset your password "
    >

        <form @submit.prevent="register.submit">
            <div class="grid gap-y-8 pt-2">
               <SharedFormBaseInput
                            v-model="register.fields.password"
                            :error="register.errors.password"
                            id="password"
                            name="password"
                            type="password"
                            placeholder="New Password"
                        />

                        <SharedFormBaseInput
                            v-model="register.fields.password_confirmation"
                            :error="register.errors.password_confirmation"
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            placeholder="Re-enter Password"
                        />


                <SharedFormSubmitButton
                    :isLoading="register.processing"
                    text="Proceed"
                />
                
            </div>
        </form>

    </AuthInnerLayout>
    
</template>