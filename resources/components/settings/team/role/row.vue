<script setup lang="ts">
const props = defineProps<{ role: App.Data.Settings.Team.RoleData }>();
const status =ref(props.role.status);
    status.value='active'

</script>

<template>
   <tr>
    <td
        class="whitespace-nowrap px-6 py-4  _sm:shrink sm:py-3 capitalize text-base"
    >
        {{ role.name }}
    </td>
    <td
        class="py-4 sm:py-3 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"
    >
        <span
            :class="status ==='active' ? 'bg-forest-100 text-forest':'bg-crimson-100 text-crimson' "
            class="px-2 py-1 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500"
        >
            <SharedCommonIcon v-if="status==='active'" name="check" class="size-4 rounded-full text-white p-[2px] bg-forest"/>
            <SharedCommonIcon v-else name="close" class="text-white rounded-full bg-crimson"/>
            {{ status }}
        </span>
    </td>
    <td
        class="px-6 sm:px-4 py-4 sm:py-3 whitespace-nowrap text-end font-medium flex items-center gap-x-2"
    >
        <SharedFormBaseSwitch />
    </td>
</tr>

</template>
