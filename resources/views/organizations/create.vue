<script setup lang="ts">
useHead({
    title: "Create an Organization",
});
const create = useForm({
    method: "POST",
    url: route("organizations.store"),
    fields: {
        name: "",
        address: "",
        logo: "",
        description: "",
    },
    hooks: {
        start: () => console.log("The request has started."),
        fail: () => console.log("The request has failed."),
        after: () => console.log("The request has finished."),
        success: () => console.log("The request has succeeded."),
    },
});
</script>

<template layout="organization">
    <LayoutOrganisatonContent subtitle="Create an Organisation" description="Invite and manage members">


            <div class="mt-8">
                <form @submit.prevent="create.submit">
                    <div class="grid gap-y-6">
                        <div class="flex flex-col justify-center">
                        
                        <SharedFormBaseImageUpload
                            v-model="create.fields.logo"
                            :error="create.errors.logo"
                        />
</div>
                        <SharedFormBaseInput
                            v-model="create.fields.name"
                            :error="create.errors.name"
                            id="name"
                            name="name"

                            placeholder="Organisation Name"
                        />
                        <SharedFormBaseInput
                            v-model="create.fields.address"
                            :error="create.errors.address"
                            id="name"
                            name="name"
                            placeholder="Address"
                        />

                        <SharedFormBaseTextarea
                            v-model="create.fields.description"
                            :error="create.errors.description"
                            id="description"
                            name="description"
                            placeholder="Description"
                        />

                        
                        <SharedFormSubmitButton text="Create"/>
                    </div>
                </form>
            </div>



    </LayoutOrganisatonContent>
    </template>
