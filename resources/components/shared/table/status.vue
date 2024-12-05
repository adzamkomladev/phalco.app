<script setup lang="ts">
import { StatusType } from "~/resources/interfaces/table/index.interface";

const props = withDefaults(
    defineProps<{
        status: StatusType;
        mode?: "status" | "availability";
    }>(),
    {
        status: "active",
    },
);

const computedClass = (state: string) => {
    switch (state.toLowerCase()) {
        case "active":
        case "enabled":
            return "bg-forest-535 text-forest-700";
        case "inactive":
        case "disabled":
            return "bg-crimson-535 text-crimson-200";
        default:
            return "";
    }
};

const iconClass = (state: string) => {
    switch (state.toLowerCase()) {
        case "active":
        case "enabled":
            return "size-4 rounded-full text-white p-[2px] bg-forest";
        case "inactive":
        case "disabled":
            return "size-4 rounded-full text-white rounded-full bg-crimson";
        default:
            return "";
    }
};

const resolveLabel = (state: string, mode: string) => {
    if (mode === "availability") {
        return state === "active" ? "Enabled" : "Disabled";
    }
    return state.charAt(0).toUpperCase() + state.slice(1).toLowerCase();
};
</script>

<template>
    <span
        :class="computedClass(status)"
        class="px-2 py-1 self-center dark:text-forest-100 inline-flex items-center gap-x-1 text-xs font-medium rounded-full"
    >
        <SharedCommonIcon
            :name="
                status.toLowerCase() === 'active' ||
                status.toLowerCase() === 'enabled'
                    ? 'check'
                    : 'close'
            "
            :class="iconClass(status)"
        />
        {{ resolveLabel(status, mode || "status") }}
    </span>
</template>
