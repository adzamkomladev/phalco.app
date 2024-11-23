import Sheet from "~/resources/components/shared/common/sheet.vue";
type OverlayPropsType ="modal-center" | "modal-top" | "sidedrawer" | "sidedrawer-center";


export interface SheetProps {
    title?: string;
    subtitle?: string;
    description?: string;
    pageImage?: string;
}
export interface OverlayProps extends SheetProps {
    useSheet?: boolean;
    size?: string;
    maxSize?: string;
    type?: OverlayPropsType;
    OverlayClass?: string;
    outerClass?: string;
    hideTitle?: string;
    contentClass?: string;
}
