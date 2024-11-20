<script setup lang="ts">
const props = defineProps<{
    roles: App.Data.Settings.Team.RoleData[];
}>();
</script>

<template>
    <SharedCommonOverlay
        title="Roles"
        size="xl"
        useSheet
        description="Manage all team roles"
        subtitle=""
        type="sidedrawer"
        class=""
    >
        <div>
            <SettingsTeamRoleTable :data="roles" />
        </div>
    </SharedCommonOverlay>
</template>
