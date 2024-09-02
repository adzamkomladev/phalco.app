<script setup lang="ts">
useHead({
    title: "New Election",
});
const form = useForm({
    method: "POST",
    url: route("elections.store"),
    fields: {
        name: "",
        description: "",
        logo: "",
        start: null,
        end: null,
    },
    hooks: {
        success: () => form.reset(),
    },
});
</script>

<template>
    <SharedCommonOverlay title="New Election" size="xl">
        <form @submit.prevent="form.submit">
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                <div class="sm:col-span-3">
                    <label
                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                    >
                        Logo
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <SharedFormBaseImageUpload
                        v-model="form.fields.logo"
                        :error="form.errors.logo"
                    />
                </div>

                <div class="sm:col-span-3">
                    <label
                        for="name"
                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                    >
                        Name
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <SharedFormBaseInput
                        v-model="form.fields.name"
                        :error="form.errors.name"
                        id="name"
                        name="name"
                        placeholder="Election Name"
                    />
                </div>
                <!-- Form Group -->

                <div class="sm:col-span-3">
                    <label
                        for="description"
                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                    >
                        Description
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <SharedFormBaseTextarea
                        v-model="form.fields.description"
                        :error="form.errors.description"
                        id="description"
                        name="description"
                        placeholder="Enter election description"
                    />
                </div>

                <div class="sm:col-span-3">
                    <label
                        for="start"
                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                    >
                        Start Date
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <SharedFormBaseInput
                        v-model="form.fields.start"
                        :error="form.errors.start"
                        id="start"
                        name="start"
                        type="datetime-local"
                    />
                </div>

                <div class="sm:col-span-3">
                    <label
                        for="end"
                        class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                    >
                        End Date
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <SharedFormBaseInput
                        v-model="form.fields.end"
                        :error="form.errors.end"
                        id="end"
                        name="end"
                        type="datetime-local"
                    />
                </div>
            </div>

            <div class="mt-8 flex justify-end gap-x-2">
                <button
                    type="submit"
                    class="w-3/12 py-2 px-3 items-center gap-x-2 text-sm text-center font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                >
                    <span
                        v-if="form.processing"
                        class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full"
                        role="status"
                        aria-label="loading"
                    ></span>

                    Create
                </button>
            </div>
        </form>
    </SharedCommonOverlay>
</template>
