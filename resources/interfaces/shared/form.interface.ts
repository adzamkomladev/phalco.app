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


export interface BaseSelectProps extends FormProp {
    options: { label: string; value: any }[];
    error?: string;
}

export interface SearchInputProps extends FormProp {
    placeholder?: string;
}
