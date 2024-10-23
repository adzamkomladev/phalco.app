<script setup lang="ts">
import { OrganizationProps } from "~/resources/interfaces/organisation/index.interface";

const props = defineProps<{
    organization: OrganizationProps;
    loading: boolean;
}>();
</script>

<template>
    <button
        @click="$emit('select', organization.id)"
        type="submit"
        class="w-full justify-between font-black text-gray-600 shadow focus:text-white gap-20 border-[#E3E4E6] hover:border-gray-400 h-20 _md:h-16 py-2 px-4 flex items-center gap-x-2 text-base xl:text-lg rounded-lg border-2 border-transparent active:opacity-90 hover:bg-gray-50 hover:opacity-90 focus:outline-none focus:bg-primary-400 disabled:opacity-50 disabled:pointer-events-none"
    >
        <div class="flex gap-4 items-center">
            <img class="size-12" :src="organization.logo" />
            <span>{{ organization.name }} </span>
        </div>

        <span
            v-if="loading"
            class="animate-spin mx-2 inline-block size-5 border-[3px] border-current border-t-transparent text-white rounded-full"
            role="status"
            aria-label="loading"
        ></span>
    </button>
</template>
