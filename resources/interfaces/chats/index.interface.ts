

export interface  Data{ value: number; label: string }[]; 
export interface BarChatProps {
    data?:Data[];
    values: number[];
    labels: string[];
    colors?: string[];
    defaultColor?: string;
    unit:string;
}

export interface PieChartData extends Data {
    color?:string;
}