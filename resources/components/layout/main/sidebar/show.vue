<script setup lang="ts">
import { SideBarMenuProps } from "~/resources/interfaces/layout/main-sidebar.interface";
import { menus as data } from "~/resources/data/layout/main/sidebar";

const pollingStationId = useProperty("elections.agentPollingStation.id");
const electionId = useProperty("elections.selected.id");

const menus: SideBarMenuProps[] = data;
</script>

<template>
    <nav
        class="hs-accordion-group  p-3 w-full flex flex-col flex-wrap h-full"
        data-hs-accordion-always-open
    >
        <div class="flex flex-col justify-between h-full">
            <ul class="flex flex-col space-y-1 2xtall:mt-10">
                <LayoutMainSidebarMenu
                    v-for="(menu, index) in menus"
                    :key="index"
                    :menu="menu"
                />
            </ul>

            <LayoutMainOrganizationSelector />
        </div>
    </nav>
</template>
