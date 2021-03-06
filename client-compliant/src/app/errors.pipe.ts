import {Pipe, PipeTransform} from '@angular/core';

@Pipe({
    name: 'errors'
})
export class ErrorsPipe implements PipeTransform {


    transform(errors) {
        if (errors.required) {
            return 'This field is cannot be blank';
        }
        if (errors.lessThan) {
            return `should be greater than start time (${errors.lessThan.value}) `;
        }
        if (errors.api) {
            return errors.api.value;
        }
        return 'other';
    }

}
