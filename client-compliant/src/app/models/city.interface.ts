import {Country} from './country.interface';

export interface City {
    id: number,
    name: string,
    country_id: number,
    country: Country
}
