export interface FormProp {
    id?: string;
    label?: string;
    name?: string;
    placeholder?: string;
}

export interface BaseInputProps extends FormProp {
    type?: string;
    placeholder?: string;
    required?: boolean;
    autocomplete?: string;
    error?: string;
}


export interface BaseDateInputProps extends BaseInputProps {
    startDate?: Date | null;
    endDate?: Date | null;
    disablePast?: boolean;
    latestDate?: Date;
    farthestDate?: Date;
    scope: "start" | "end" | "general";
    type: "datetime" | "date";
}

export interface ButtonProps {
    type?: string;
    label?: string;
    loading?: boolean;
}

export interface BaseToggleProps extends FormProp { }

export interface BaseRadioButtonProps<T> extends FormProp {
    options: { label: string; value: T }[];
}

export interface BaseSelectProps extends FormProp {
    options: { label: any; value: any }[];
    error?: string;
    placeholder?: string;
}

export interface SearchInputProps extends FormProp {
    placeholder?: string;
}

export interface SubmitButtonProps {
    loading?: boolean;
    text?: string;
    type?: "submit" | "simple" | string;
}
export interface BaseTextareaProps extends FormProp {
    error?: string;
    placeholder?: string;
    required?: boolean;
    autocomplete?: string;
    rows?: number;
}


export interface BaseOtpProps extends FormProp {
    error?: string;
    length?: number;
}

export interface BaseAdvanceSelectProps extends FormProp{
    modelValue: string | number;
    options: Array<string | number | {label:string,value:string}>;
    position?:
    | "top-right"
    | "top-left"
    | "top-center"
    | "bottom-right"
    | "bottom-left"
    | "bottom-center";
    selectedClass?: string;
    selectClass?: string;
    optionClass?: string;
    optionsClass?: string;
    hideOnSelect?: boolean;
}

