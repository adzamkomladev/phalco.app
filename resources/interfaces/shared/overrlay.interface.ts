import Sheet from "~/resources/components/shared/common/sheet.vue";

export interface SheetProps {
    title?: string;
    subtitle?: string;
    description?: string;
    pageImage?: string;
}
export interface OverlayProps extends SheetProps{
    useSheet?: boolean;
    size?: string;
    maxSize?: string;
}
