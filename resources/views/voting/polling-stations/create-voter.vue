<script setup lang="ts">
import VoterImage from "~/resources/images/voting/voter_create.webp?src";

useHead({
    title: "Voting: New Polling Station",
});

const elections: any = useProperty("elections.all");

const isUpload = ref(false);

const toggleUploadForm = () => (isUpload.value = !isUpload.value);
</script>

<template>
    <SharedCommonOverlay
        :title="isUpload ? 'Upload Polling Station(s)' : 'New Polling Station'"
        class="max-w-xl w-xl _sm:max-w-full"
    >
        <div
            class="flex flex-row-reverse rounded-3xl bg-secondary-300 dark:bg-gradient-to-r from-secondary-950 to-secondary-800"
        >
            <div class="font-medium pt-10 basis-1/2 shrink-0 grow">
                <p class="text-gray-50 text-lg dark:text-gray-100">
                    Add new Polling Station
                </p>
                <p class="font-normal text-xs dark:text-gray-300 text-gray-100">
                    Select or create a new account for withdwaral purposes
                </p>
            </div>
            <div class="h-52 p-5 shrink-0">
                <img :src="VoterImage" class="_sm:hidden h-full w-auto" />
            </div>
        </div>
        <div class="mt-5">
            <transition mode="out-in">
                <VotingPollingStationsVoterForm
                    :elections="elections"
                    v-if="!isUpload"
                />
                <VotingPollingStationsVoterUpload
                    :elections="elections"
                    v-else
                />
            </transition>
        </div>
        <div class="mt-5">
            <a
                class="cursor-pointer text-primary-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-primary-500"
                @click.prevent="toggleUploadForm"
            >
                {{ isUpload ? "Single?" : "Upload?" }}
            </a>
        </div>
    </SharedCommonOverlay>
</template>

<style scoped>
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
