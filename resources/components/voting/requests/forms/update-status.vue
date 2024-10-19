<script setup lang="ts">
const props = defineProps<{
    voteEntryRequestId: number;
}>();

const form = useForm({
    method: "POST",
    url: route("voting.requests.status.update"),
    fields: {
        vote_entry_request_id: props.voteEntryRequestId,
        status: null,
        comment: "",
    },
    hooks: {
        success: () => form.reset(),
    },
});

const statuses = [
    { value: "confirmed", label: "Confirm" },
    { value: "rejected", label: "Reject" },
];
</script>

<template>
    <form @submit.prevent="form.submit">
        <SharedFormBaseSelect
            v-model="form.fields.status"
            :error="form.errors.status"
            id="status"
            name="status"
            :options="statuses"
            label="Status"
        />
        <SharedFormBaseTextarea
            v-model="form.fields.comment"
            id="comment"
            name="comment"
            label="Comment"
        />

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

                Update
            </button>
        </div>
    </form>
</template>
