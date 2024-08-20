<script setup lang="ts">
useHead({
    title: "Create an Organization",
});
const create = useForm({
    method: "POST",
    url: route("organizations.store"),
    fields: {
        name: "",
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
    <div
        class="bg-white border border-gray-200 shadow-sm mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1
                    class="block text-2xl font-bold text-gray-800 dark:text-white"
                >
                    Create an organization
                </h1>
            </div>

            <div class="mt-8">
                <form @submit.prevent="create.submit">
                    <div class="grid gap-y-6">
                        <SharedFormBaseImageUpload
                            v-model="create.fields.logo"
                            :error="create.errors.logo"
                        />

                        <SharedFormBaseInput
                            v-model="create.fields.name"
                            :error="create.errors.name"
                            id="name"
                            name="name"
                            label="Name"
                        />

                        <SharedFormBaseInput
                            v-model="create.fields.description"
                            :error="create.errors.description"
                            id="description"
                            name="description"
                            label="Description"
                        />

                        <button
                            type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        >
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
