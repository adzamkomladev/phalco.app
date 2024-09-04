interface FormProp {
    id?: string;
    label?: string;
    name: string;
}

export interface BaseInputProps extends FormProp {
    type?: string;
    placeholder?: string;
    required?: boolean;
    autocomplete?: string;
    error?: string;
}


export interface BaseCheckboxProps extends FormProp { }

export interface BaseRadioButtonProps<T> extends FormProp {
    options: { label: string; value: T }[];
}

export interface BaseSelectProps extends FormProp {
    options: { label: string; value: any }[];
    error?: string;
}

export interface SearchInputProps extends FormProp {
    placeholder?: string;
}

export interface BaseTextareaProps extends FormProp {
    error?: string;
    placeholder?: string;
    required?: boolean;
    autocomplete?: string;
    rows?: number;
}
