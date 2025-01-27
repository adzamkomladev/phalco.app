<script setup lang="ts">
import { SideBarMenuProps } from "~/resources/interfaces/layout/main-sidebar.interface";

const props = defineProps<{ menu: SideBarMenuProps }>();

const isOpen = ref(false);
const hasSublink = computed(
    () => props.menu.sublink && props.menu.sublink.length > 0,
);

const toggleSublink = () => {
    isOpen.value = !isOpen.value;
};

const { isNavigating, current, matches } = useRoute();
const isCurrentRoute = computed(() => {
    return current.value === props.menu.to && !isNavigating.value;
});
</script>

<template>
    <div class="capitalize">
        <button
            v-if="!menu.to || hasSublink"
            @click="toggleSublink"
            type="button"
            class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:focus:bg-slate-700 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300"
        >
            <SharedCommonIcon
                v-if="menu.icon"
                :name="menu.icon"
                class="dark:text-primary-500"
            />
            {{ menu.label }}
            <SharedCommonIcon
                stroke-width="0"
                v-if="hasSublink"
                name="chevron"
                :class="['ms-auto', !isOpen ? 'rotate-180' : '', 'size-4']"
            />
        </button>
        <router-link
            v-if="menu.to && !hasSublink"
            :href="route(menu.to)"
            :class="[
                isCurrentRoute
                    ? 'bg-secondary-500 dark:bg-primary-800 text-white pointer-events-none'
                    : 'hover:bg-gray-100',
                menu.icon ? 'px-1.5' : 'pl-3.5',
            ]"
            class="w-full text-start transition-all duration-300 flex items-center gap-x-3.5 py-2 text-sm text-gray-800 rounded-lg dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300"
        >
            <SharedCommonIcon
                :name="menu.icon"
                v-if="menu.icon"
                class="dark:text-primary-500"
            />
            <span class=""> {{ menu.label }} </span>
        </router-link>
    </div>
</template>
