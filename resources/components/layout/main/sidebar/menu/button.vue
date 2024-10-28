<template>
    <div>
        <button
            v-if="!menu.to || hasSublink"
            @click="toggleSublink"
            type="button"
            class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
        >
            <SharedCommonIcon v-if="menu.icon" :name="menu.icon" />
            {{ menu.label }}
            <SharedCommonIcon
                v-if="hasSublink"
                name="chevron"
                :class="['ms-auto', !isOpen ? 'rotate-180' : '']"
            />
        </button>

        <router-link
            v-if="menu.to && !hasSublink"
            :href="route(menu.to)"
            type="button"
            class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
        >
            <SharedCommonIcon :name="menu.icon" />
            {{ menu.label }}
        </router-link>
    </div>
</template>

<script setup lang="ts">
import { SideBarMenuProps } from "~/resources/interfaces/layout/main-sidebar.interface";

const props = defineProps<{ menu: SideBarMenuProps }>();

const isOpen = ref(false);

const hasSublink = computed(() => {
    return props.menu.sublink && props.menu.sublink.length > 0;
});

const toggleSublink = () => {
    isOpen.value = !isOpen.value;
};
</script>
