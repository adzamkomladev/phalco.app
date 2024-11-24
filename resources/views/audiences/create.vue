<script setup lang="ts">
useHead({
    title: "New Audience",
});

const form = useForm({
    method: "POST",
    url: route("audiences.store"),
    fields: {
        name: "",
        description: "",
        uploaded_contacts: null,
    },
    hooks: {
        success: () => form.reset(),
    },
});
</script>

<template>
    <SharedCommonOverlay
        class="max-w-xl _sm:max-w-full"
        title="New Audience"
        size="xl"
    >
        <form
            @submit.prevent="form.submit"
            class="flex flex-col gap-5 mt-10 px-4 sm:px-8"
        >
            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.name"
                    :error="form.errors.name"
                    id="name"
                    name="name"
                    placeholder="Audience Name"
                />
            </div>

            <div>
                <SharedFormBaseTextarea
                    v-model="form.fields.description"
                    :error="form.errors.description"
                    id="description"
                    name="description"
                    placeholder="Enter audience description"
                />
            </div>
            <div>
                <SharedFormBaseFileUpload
                    v-model="form.fields.uploaded_contacts"
                />
            </div>

            <div class="py-10">
                <SharedFormSubmitButton text="create" />
            </div>
        </form>
    </SharedCommonOverlay>
</template>
