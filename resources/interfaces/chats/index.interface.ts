export interface barChatProps {
    data?: { value: number; label: string }[]; // Make data optional
    values: number[];
    labels: string[];
    colors?: string[];
    defaultColor?: string;
}