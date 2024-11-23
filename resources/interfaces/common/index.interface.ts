export interface ProgressBarProps {
    total: number;
    progress: number;
    width?: string;
    height?: string;
    loadedClass?: string;
    unloadedClass?: string;
    title?:string;
}

export interface Sheet{
        title?: string;
    description?: string;
    pageImage?: string;
}

export interface DropDown {
    position?: positionType;
    hideContentOnSelect?: boolean;
    buttonClass?: string;
    dialogClass?: string;
}

export type positionType= "top-right" | "top-left" | "top-center"| "bottom-right"| "bottom-left"| "bottom-center";
