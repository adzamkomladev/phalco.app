<script setup lang="ts">
const props = defineProps<{ role: App.Data.Settings.Team.RoleData }>();

const status = ref(props.role.status);

// Computed property to track active/inactive state as a boolean
const isActive = computed({
  get: () => status.value.toLowerCase() === 'active',
  set: (value) => {
    status.value = value ? 'active' : 'inactive';
  },
});
</script>

<template>
  <tr>
    <td class="whitespace-nowrap px-6 py-4 sm:ps-8 capitalize text-base">
      {{ role.name }}
    </td>
    <td
      class="px-6  w-36  py-4 _sm:px-3 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"
    >
     <SharedTableStatus :status="status"/> 
    </td>
    <td
      class="px-6 _sm:px-4 py-4 sm:pe-8 whitespace-nowrap text-end font-medium flex items-center gap-x-2"
    >
      <SharedFormBaseSwitch v-model="isActive" />
    </td>
  </tr>
</template>
