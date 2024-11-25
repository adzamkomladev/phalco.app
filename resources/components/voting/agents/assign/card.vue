<script setup lang="ts">
import { StatsCardProps } from "~/resources/interfaces/shared/common.interface";

const props = withDefaults(defineProps<StatsCardProps>(), {
    icon: "campaign_menu",
    value: "120",
    description: "",
});

const AgentData = [
    {
        label: "Agent A",
        value: 25,
        color: "#00B4D8",
    },
    {
        label: "Agent B",
        value: 35,
        color: "#0077B6",
    },
    {
        label: "Agent C",
        value: 40,
        color: "#03045E",
    },
];
</script>

<template>
    <SharedCommonCard
        class="font-medium p-[8%] flex flex-col justify-center shadow-card _sm:shadow _sm:p-5 rounded-2xl relative"
    >
        jjj
    </SharedCommonCard>
</template>
