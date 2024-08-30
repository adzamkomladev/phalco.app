<script setup lang="ts">
const props = defineProps<{
    invitations: App.Data.Settings.Team.InvitationData[];
}>();
</script>

<template>
    <SharedCommonOverlay title="Invitations" size="2xl">
        <div class="grid gap-y-8">
            <SettingsTeamSendInvitationForm />
            <SettingsTeamInvitationsTable :data="props.invitations" />
        </div>
    </SharedCommonOverlay>
</template>
