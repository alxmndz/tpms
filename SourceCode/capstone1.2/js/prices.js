<script>
document.addEventListener("DOMContentLoaded", function() {
  const eventSelect = document.getElementById("event");
  const amountInput = document.getElementById("amount");

  // Define event price mapping
  const eventPrices = {
    "Baptismal Certificate": 10,
    "Communion Certificate": 15,
    "Confirmation Certificate": 20,
    "Death Certificate": 25,
    "Marriage Certificate": 30
  };

  // Function to update the amount based on selected event
  function updateAmount() {
    const selectedEvent = eventSelect.value;
    const eventPrice = eventPrices[selectedEvent] || 0;
    amountInput.value = eventPrice;
  }

  // Attach event listener to update amount when event changes
  eventSelect.addEventListener("change", updateAmount);

  // Initial update of the amount
  updateAmount();
});
</script>