export interface SideBarMenuProps {
    label: string; // Display text for the menu item
    icon?: string; // Icon associated with the menu item
    to?: string | { name: string; params?: Record<string, any> }; // Route/link, allowing optional params
    sublink?: SideBarMenuProps[]; // Optional array of sub-menu items
}
