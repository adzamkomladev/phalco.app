<script lang="ts" setup>
import { VoteRequestResponseProps } from "~/resources/interfaces/voting/requests/show.interface";

const props = withDefaults(defineProps<VoteRequestResponseProps>(), {
    status: "Pending",
    optionName: "Presidential Candidate",
});

const dateSent = useDateFormat(props.requestedAt, "YYYY MMM DD HH:mm:ss");
</script>

<template>
    <sharedCommonCard
        class="flex justify-between items-center w-full sm:place-self-center rounded-lg"
    >
        <div class="">
            <p class="text-lg mobile:text-sm font-semibold">{{ optionName }}</p>
            <p class="text-black/50 text-xs flex flex-wrap">
                <span>Date requested:</span> <span>{{ dateSent }}</span>
            </p>
        </div>
        <div class="">
            <SharedTableRequestStatus
                v-if="status != 'Pending'"
                :status="status"
                class="mobile:scale-75"
            />
            <div class="flex gap-2" v-else>
                <router-link
                    class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-primary-500 border border-transparent rounded-md cursor-pointer gap-x-2 hover:opacity-90 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    Accept
                </router-link>
                <router-link
                    class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-500 hover:text-crimson-500 hover:border-crimson-500 border rounded-md cursor-pointer gap-x-2 hover:opacity-90 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1"
                >
                    Decline
                </router-link>
            </div>
        </div>
    </sharedCommonCard>
</template>
