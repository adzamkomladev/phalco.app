<script setup lang="ts">
defineProps<{ stats: App.Data.Settings.Team.InvitationStatsData }>();
</script>
<template>
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <!-- Card -->

            <!-- End Card -->

            <SettingsTeamStatsCard
                title="Members"
                color="text-forest-500"
                :total="stats.totalMembers"
                :changePercentage="stats.changeMembers.percentage"
                :changeTotal="stats.changeMembers.total"
            />
            <!-- Card -->
            <!-- End Card -->

            <SettingsTeamStatsCard
                title="invites"
                color="text-forest-500"
                :total="stats.totalInvites"
                :changePercentage="stats.changeInvites.percentage"
                :changeTotal="stats.changeInvites.total"
            />
            <!-- Card -->
            <!-- End Card -->

            <SettingsTeamStatsCard
                title="Rejections"
                color="text-crimson-500"
                :total="stats.totalRejections"
                :changePercentage="stats.changeRejections.percentage"
                :changeTotal="stats.changeRejections.total"
            />
            <!-- Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
</template>
