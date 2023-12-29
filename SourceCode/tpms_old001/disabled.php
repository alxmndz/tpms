<!-- Baptismal Modal-->
<div class="modal fade" id="bapModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <span>Baptismal Reservation Form</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="php/saveBap.php" method="POST" enctype="multipart/form-data" autocomplete="off">

<input type="radio" name="enableDisableInput" value="enable" checked> Enable input tags
<input type="radio" name="enableDisableInput" value="disable"> Disable input tags

<input type="text" id="inputText" disabled>
<input type="number" id="inputNumber" disabled>

        </form>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
const enableDisableInputRadioButtons = document.querySelectorAll('input[name="enableDisableInput"]');
const inputText = document.querySelector('#inputText');
const inputNumber = document.querySelector('#inputNumber');

enableDisableInputRadioButtons.forEach((radioButton) => {
  radioButton.addEventListener('change', () => {
    if (radioButton.value === 'enable') {
      inputText.disabled = false;
      inputNumber.disabled = false;
    } else {
      inputText.disabled = true;
      inputNumber.disabled = true;
    }
  });
});


</script>