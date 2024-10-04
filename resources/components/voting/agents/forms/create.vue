<script setup lang="ts">
const props = defineProps<{
    elections: { id: number; name: string }[];
}>();

const form = useForm({
    method: "POST",
    url: route("voting.agents.store"),
    fields: {
        first_name: "",
        last_name: "",
        email: "",
        election_id: null,
        polling_station_id: null,
    },
    hooks: {
        success: () => form.reset(),
    },
});

const electionOptions = props.elections?.map((e: { id: any; name: any }) => ({
    value: e.id,
    label: e.name,
}));
</script>

<template>
    <form @submit.prevent="form.submit">
        <h4 class="h4 mb-5 font-bold">Single Agent</h4>
        <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
            <div class="sm:col-span-3">
                <label
                    for="first_name"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                    First Name
                </label>
            </div>

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.first_name"
                    :error="form.errors.first_name"
                    id="first_name"
                    name="first_name"
                    placeholder="Agent First Name"
                />
            </div>
            <div class="sm:col-span-3">
                <label
                    for="last_name"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                    Last Name
                </label>
            </div>

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.last_name"
                    :error="form.errors.last_name"
                    id="last_name"
                    name="last_name"
                    placeholder="Agent Last Name"
                />
            </div>
            <div class="sm:col-span-3">
                <label
                    for="email"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                    Email
                </label>
            </div>
            <!-- End Col -->

            <div class="sm:col-span-9">
                <SharedFormBaseInput
                    v-model="form.fields.email"
                    :error="form.errors.email"
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Agent Email Address"
                />
            </div>

            <!-- <div class="sm:col-span-3">
                <label
                    for="election_id"
                    class="inline-block text-sm text-gray-800 mt-2.5 dark:text-neutral-200"
                >
                    Election
                </label>
            </div>

            <div class="sm:col-span-9">
                <SharedFormBaseSelect
                    v-model="form.fields.election_id"
                    :error="form.errors.election_id"
                    id="election_id"
                    name="election_id"
                    :options="electionOptions"
                    placeholder="Select Election..."
                />
            </div> -->
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
</template>
