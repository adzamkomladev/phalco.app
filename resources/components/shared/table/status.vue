<script setup lang="ts">
import { StatusType } from "~/resources/interfaces/table/index.interface";

const props = defineProps<{
    status: StatusType;
}>();
</script>

<template>
    <span
        :class="
            status.toLowerCase() === 'active'
                ? 'bg-forest-535 text-forest-700'
                : 'bg-crimson-535 text-crimson-200'
        "
        class="px-2 py-1 self-center dark:text-forest-100 inline-flex items-center gap-x-1 text-xs font-medium rounded-full"
    >
        <SharedCommonIcon
            v-if="status.toLowerCase() === 'active'"
            name="check"
            class="size-4 rounded-full text-white p-[2px] bg-forest"
        />
        <SharedCommonIcon
            v-else
            name="close"
            class="size-4 text-white rounded-full bg-crimson"
        />
        {{ status }}
    </span>
</template>
