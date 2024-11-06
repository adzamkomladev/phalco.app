export interface SideBarMenuProps {
    label: string; 
    icon?: string; 
    to?: string | { name: string; params?: Record<string, any> }; 
    sublink?: SideBarMenuProps[]; 
}
