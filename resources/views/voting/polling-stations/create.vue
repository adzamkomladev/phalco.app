<script setup lang="ts">
import PolloingStationImage from "~/resources/images/voting/new_polling_station.webp?src";

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
            <div class="h-60 p-5 shrink-0">
                <img
                    :src="PolloingStationImage"
                    class="_sm:hidden h-full w-auto"
                />
            </div>
        </div>
        <div class="mt-5">
            <transition mode="out-in">
                <VotingPollingStationsFormCreate
                    :elections="elections"
                    v-if="!isUpload"
                />
                <VotingPollingStationsFormUpload
                    :elections="elections"
                    v-else
                />
            </transition>
            <div class="mt-5">
                <a
                    class="cursor-pointer text-primary-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-primary-500"
                    @click.prevent="toggleUploadForm"
                >
                    {{ isUpload ? "Single?" : "Upload?" }}
                </a>
            </div>
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
