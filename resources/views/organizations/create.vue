<script setup lang="ts">
useHead({
    title: "Create an Organization",
});
const form = useForm({
    method: "POST",
    url: route("organizations.store"),
    fields: {
        name: "",
        address: "",
        logo: "",
        description: "",
    },
    hooks: {
        success: () => form.reset(),
    },
});
</script>

<template layout="organization">
    <LayoutOrganisatonContent
        subtitle="Create an Organization"
        description="Enter organization details"
    >
        <div class="mt-4">
            <form @submit.prevent="form.submit">
                <div class="grid gap-y-6">
                    <div class="flex flex-col justify-center">
                        <SharedFormBaseImageUpload
                            v-model="form.fields.logo"
                            :error="form.errors.logo"
                        />
                    </div>
                    <SharedFormBaseInput
                        v-model="form.fields.name"
                        :error="form.errors.name"
                        id="name"
                        name="name"
                        placeholder="Organization Name"
                    />
                    <SharedFormBaseInput
                        v-model="form.fields.address"
                        :error="form.errors.address"
                        id="name"
                        name="name"
                        placeholder="Address"
                    />

                    <SharedFormBaseTextarea
                        v-model="form.fields.description"
                        :error="form.errors.description"
                        id="description"
                        name="description"
                        placeholder="Description"
                    />

                    <SharedFormSubmitButton text="Create" />
                </div>
            </form>
        </div>
    </LayoutOrganisatonContent>
</template>
