<script setup lang="ts">
import { SideBarMenuProps } from "~/resources/interfaces/layout/main-sidebar.interface";

const props = defineProps<{ menu: SideBarMenuProps }>();
</script>

<template>
    <li>
        <SharedAnimationCollapsible>
            <template v-slot:summary>
                <LayoutMainSidebarMenuButton :menu="props.menu" />
            </template>

            <!-- Render submenus if available -->
            <div
                v-if="props.menu.sublink && props.menu.sublink.length > 0"
                role="region"
                class="flex-grow"
            >
                <ul class="ps-8 pt-1 space-y-1 flex-grow">
                    <li
                        v-for="(subMenu, index) in props.menu.sublink"
                        :key="index"
                    >
                        <!-- Nested collapsible for sub-submenus -->
                        <SharedAnimationCollapsible>
                            <template v-slot:summary>
                                <LayoutMainSidebarMenuButton :menu="subMenu" />
                            </template>

                            <!-- Render sub-submenu links -->
                            <ul class="ps-8 pt-1 space-y-1" v-if="subMenu.sublink">
                                <li
                                    v-for="(
                                        subSubMenu, subIndex
                                    ) in subMenu.sublink"
                                    :key="subIndex"
                                >
                                    <SharedAnimationCollapsible class>
                                        <template v-slot:summary>
                                            <LayoutMainSidebarMenuButton
                                                :menu="subSubMenu"
                                            />
                                        </template>
                                    </SharedAnimationCollapsible>
                                </li>
                            </ul>
                        </SharedAnimationCollapsible>
                    </li>
                </ul>
            </div>
        </SharedAnimationCollapsible>
    </li>
</template>
