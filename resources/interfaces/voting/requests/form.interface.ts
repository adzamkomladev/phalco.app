import { FormProp } from "../../shared/form.interface";

export interface OptionInputProps extends FormProp {
    optionId: number;
    avatar?: string;
}

export interface OptionsInputProps extends FormProp {
    options: Option[];
}

interface Option {
    id: number;
    order: number;
    name: string;
    avatar?: string;
}
