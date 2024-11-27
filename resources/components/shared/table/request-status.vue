<script setup lang="ts">
import { RequestStatusType } from "~/resources/interfaces/shared/common.interface";

const props = defineProps<{ status: RequestStatusType }>();

const getStatusClasses = (status: string) => {
    switch (status) {
        case "Accepted":
            return "bg-forest-535 text-forest-700 ";
        case "Rejected":
            return "bg-crimson-535 text-[#B8180E] ";
        case "Pending":
            return "bg-[#F1D3C0] text-[#D8824C] ";
        default:
            return "";
    }
};
</script>

<template>
    <div
        class="inline-flex items-center gap-1.5 mobile:gap-0.5 h-fit mobile:py-1 py-1.5 place-content-center px-2 mobile:text-[10px] mobile:w-[80px] w-24 rounded-full text-xs font-semibold"
        :class="getStatusClasses(status)"
    >
        <SharedCommonIcon
            v-if="status === 'Accepted'"
            name="check"
            class="size-4 mobile:size-3 rounded-full text-white p-[2px] bg-forest"
        />
        <SharedCommonIcon
            v-else-if="status === 'Rejected'"
            name="close"
            class="size-4 mobile:size-3 text-white rounded-full bg-[#D85B53]"
        />
        {{ status }}
    </div>
</template>
