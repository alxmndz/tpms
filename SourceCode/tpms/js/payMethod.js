const enableDisableInputRadioButtons = document.querySelectorAll('input[name="payMethod"]');
const inputFile = document.querySelector('#inputFile');
const inputNumber = document.querySelector('#inputNumber');

enableDisableInputRadioButtons.forEach((radioButton) => {
  radioButton.addEventListener('change', () => {
    if (radioButton.value === 'gcash') {
      inputFile.disabled = false;
      inputNumber.disabled = false;
    } else {
      inputFile.disabled = true;
      inputNumber.disabled = true;
    }
  });
});