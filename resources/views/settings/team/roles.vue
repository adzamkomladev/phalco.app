<script setup lang="ts">
const props = defineProps<{
    roles: App.Data.Settings.Team.RoleData[];
}>();
</script>

<template>
    <SharedCommonOverlay title="Roles" size="xl">
        <div class="grid gap-y-8">
            <SettingsTeamRolesTable :data="props.roles" />
        </div>
    </SharedCommonOverlay>
</template>
