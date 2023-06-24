// Get all the dropdown buttons within the offcanvas-body section
const dropdownButtons = document.querySelectorAll(
  ".offcanvas-body .btn-toggle"
);

// For each dropdown button, add a click event listener
dropdownButtons.forEach((button) => {
  button.addEventListener("click", () => {
    // Get the ID of the dropdown panel associated with the button
    const panelId = button.getAttribute("data-bs-target");
    // Get the state of the panel (true if open, false if closed)
    const panelState = button.getAttribute("aria-expanded");

    // Save the state of the panel to local storage
    localStorage.setItem(panelId, panelState);
  });

  // Get the ID of the dropdown panel associated with the button
  const panelId = button.getAttribute("data-bs-target");
  // Get the saved state of the panel from local storage
  const panelState = localStorage.getItem(panelId);

  // Set the initial state of the panel based on the saved state
  if (panelState === "true") {
    button.setAttribute("aria-expanded", "true");
    const panel = document.querySelector(panelId);
    panel.classList.add("show");
  }
});