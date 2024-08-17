export interface BaseInputProps {
    id?: string;
    type?: string;
    placeholder?: string;
    required?: boolean;
    autocomplete?: string;
    error?: string;
    label: string;
    name: string;
}


export interface BaseCheckboxProps {
    id?: string;
    label: string;
    name: string;
}
