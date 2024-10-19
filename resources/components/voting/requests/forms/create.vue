<script setup lang="ts">
const props = defineProps<{
    ballot: any;
}>();

const optionsField = props.ballot.options.map((o: { id: number }) => ({
    id: o.id,
    votes: 0,
}));
const options = props.ballot.options.map(
    (o: { id: number; avatar?: string; name: string }) => ({
        id: o.id,
        avatar: o.avatar,
        name: o.name,
    }),
);
const pollingStationId = useProperty("elections.agentPollingStation.id");
const electionId = useProperty("elections.selected.id");

const form = useForm({
    method: "POST",
    url: route("voting.requests.store"),
    fields: {
        ballot_id: props.ballot.id,
        options: optionsField,
        upload_file: null,
        polling_station_id: pollingStationId.value,
        election_id: electionId.value,
    },
    hooks: {
        success: () => form.reset(),
    },
});
</script>

<template>
    <form @submit.prevent="form.submit">
        <h4 class="h4 mb-5 font-bold">{{ ballot.position }}</h4>
        <VotingRequestsFormsOptions
            v-model="form.fields.options"
            :options="options"
            name="options"
        />
        <SharedFormBaseFileUpload
            file-types="image/*"
            path="voting/requests"
            v-model="form.fields.upload_file"
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

                Submit
            </button>
        </div>
    </form>
</template>
