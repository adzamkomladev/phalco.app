<script setup lang="ts">
const props = defineProps<{
    status: string;
}>();

const getStatusClasses = (status: string) => {
    switch (status) {
        case "accepted":
        case "success":
        case "completed":
            return "bg-forest-535 text-forest-700 ";
        case "rejected":
        case "failed":
            return "bg-crimson-535 text-[#B8180E] ";
        case "pending":
            return "bg-[#F1D3C0] text-[#D8824C] ";
        default:
            return "bg-[#F1D3C0] text-[#D8824C] ";
    }
};
</script>

<template>
    <div
        class="inline-flex items-center gap-1.5 mobile:gap-0.5 h-fit mobile:py-1 py-1.5 place-content-center px-2 mobile:text-[10px] mobile:w-[80px] w-24 rounded-full text-xs font-semibold"
        :class="getStatusClasses(status)"
    >
        <SharedCommonIcon
            v-if="status === 'accepted'||'completed'"
            name="check"
            class="size-4 mobile:size-3 shrink-0 rounded-full text-white p-[2px] bg-forest"
        />
        <SharedCommonIcon
            v-else-if="status === 'rejected'"
            name="close"
            class="size-4 mobile:size-3 text-white rounded-full bg-[#D85B53]"
        />
        {{ status }}
    </div>
</template>
