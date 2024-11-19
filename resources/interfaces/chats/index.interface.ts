export interface BarChatProps {
    data?: { value: number; label: string }[]; // Make data optional
    values: number[];
    labels: string[];
    colors?: string[];
    defaultColor?: string;
    unit:string;
}

export interface PieChartData {
    value: number;
    label: string;
}