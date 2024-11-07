export interface ProgressBarProps {
    total: number;
    progress: number;
    width?: string;
    height?: string;
    loadedClass?: string;
    unloadedClass?: string;
    title?:string;
}
