<script setup lang="ts">
useHead({
    title: "Voting: New Polling Station",
});

const props = defineProps<{
    elections: { id: number; name: string }[];
}>();

const isUpload = ref(false);

const toggleUploadForm = () => (isUpload.value = !isUpload.value);
</script>

<template>
    <SharedCommonOverlay title="New Polling Station" size="xl">
        <div class="mt-5">
            <VotingPollingStationsCreateForm :elections="props.elections" v-if="!isUpload" />
            <VotingPollingStationsUploadForm :elections="props.elections" v-else />
            <div>
                <a
                    class="cursor-pointer text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                    @click.prevent="toggleUploadForm"
                >
                    {{ isUpload ? "Single?" : "Upload?" }}
                </a>
            </div>
        </div>
    </SharedCommonOverlay>
</template>
