    function formatMoney(input) {
        // Remove any non-digit characters and leading zeros
        let inputValue = input.value.replace(/[^\d]/g, '').replace(/^0+/, '');

        // Add comma separator for thousands
        let formattedValue = '';
        let length = inputValue.length;
        for (let i = 0; i < length; i++) {
            if ((length - i) % 3 === 0 && i !== 0) {
                formattedValue += ',';
            }
            formattedValue += inputValue[i];
        }

        // Add the Philippine Peso sign (₱) to the formatted value
        formattedValue = '₱' + formattedValue;

        // Update the input value
        input.value = formattedValue !== '₱' ? formattedValue : '';
    }