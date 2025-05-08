const prices = {
  'Laptop': 200,
  'Desktop': 300,
  'Smartphone': 75,
  'Monitor': 170,
  'Tablet': 80,
  'RAM': 70,
  'Hard Disk': 180,
  'Wireless Network Card': 60,
  'CPU': 200,
  'GPU': 500,
};

function toggleQuantityInput(checkbox, quantityId, otherInputId = null) {
  const quantityInput = document.getElementById(quantityId);
  const otherInput = otherInputId ? document.getElementById(otherInputId) : null;
  if (checkbox.checked) {
    quantityInput.style.display = 'block';
    if (otherInput) otherInput.style.display = 'block';
  } else {
    quantityInput.style.display = 'none';
    if (otherInput) {
      otherInput.style.display = 'none';
      otherInput.value = '';
    }
  }
}

function handleSubmit(event, formType) {
  event.preventDefault();
  const form = event.target;
  const selectedItems = [];
  const quantities = [];
  const pricesList = [];
  let valid = true;

  form.querySelectorAll('input[type=checkbox]:checked').forEach(checkbox => {
    let itemLabel = checkbox.value;
    let quantityInput = form.querySelector(`input[name="quantity-${itemLabel}"]`);
    let quantityValue = quantityInput ? quantityInput.value : null;
    if (itemLabel === "Other") {
      const otherNameInput = form.querySelector('input[name="other-item-name"]');
      const customName = otherNameInput.value.trim();
      if (!customName) {
        alert("Please specify the name for 'Other' item.");
        valid = false;
        return;
      }
      itemLabel = "Other: " + customName;
      const priceInput = form.querySelector('input[name="price-Other"]');
      const priceValue = priceInput ? priceInput.value : null;
      if (!priceValue || priceValue <= 0) {
        alert("Please enter a valid price for the 'Other' item.");
        valid = false;
        return;
      }
    }
    if (!quantityValue || quantityValue <= 0) {
      alert(`Please enter a valid quantity for ${itemLabel}`);
      valid = false;
      return;
    }
    selectedItems.push(itemLabel);
    quantities.push(quantityValue);
    const itemPrice = prices[itemLabel] || 8; 
    pricesList.push(itemPrice * quantityValue);
  });
  if (selectedItems.length === 0) {
    alert("Please select at least one item.");
    valid = false;
  }
  if (valid) {
    const totalPrice = pricesList.reduce((total, price) => total + price, 0);
    const otherDetails = form.querySelector('textarea[name="other-details"]')?.value.trim() || ""; 
    const submission = {
      type: formType, 
      items: selectedItems,
      quantities: quantities,
      prices: pricesList,
      totalPrice: totalPrice,
      details: otherDetails,
      date: new Date().toLocaleString(),
      status: "Pending"
    };
    const history = JSON.parse(localStorage.getItem('requestHistory')) || [];
    history.push(submission);
    localStorage.setItem('requestHistory', JSON.stringify(history));
    const transactionHistory = JSON.parse(localStorage.getItem('transactionHistory')) || [];
    transactionHistory.push({ type: formType, amount: totalPrice });
    localStorage.setItem('transactionHistory', JSON.stringify(transactionHistory));
    alert(`Thank you! Your ${formType} submission was received. Total Price: RM${totalPrice}. Please wait for the approval.`);
    form.reset();
    form.querySelectorAll('.quantity-container').forEach(div => div.style.display = 'none');
    const otherNameInput = form.querySelector('input[name="other-item-name"]');
    if (otherNameInput) otherNameInput.style.display = 'none';
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const historyContainer = document.getElementById('history-container');
  const clearButton = document.getElementById('clear-history-button');
  const history = JSON.parse(localStorage.getItem('requestHistory')) || [];
  history.forEach(entry => {
    const card = document.createElement('div');
    card.className = 'history-card';
    const title = document.createElement('h3');
    title.textContent = entry.type === 'Buy' ? '🟢 Buy Request' : '🔴 Sell Request';
    card.appendChild(title);
    const items = document.createElement('p');
    items.innerHTML = `<strong>Items:</strong> ${entry.items.join(', ')}`;
    card.appendChild(items);
    const quantities = document.createElement('p');
    quantities.innerHTML = `<strong>Quantities:</strong> ${entry.quantities.join(', ')}`;
    card.appendChild(quantities);
    const date = document.createElement('p');
    date.innerHTML = `<strong>Date:</strong> ${entry.date}`;
    card.appendChild(date);
    const status = document.createElement('p');
    status.innerHTML = `<strong>Status:</strong> ${entry.status}`;
    card.appendChild(status);
    if (entry.details) {
      const details = document.createElement('p');
      details.innerHTML = `<strong>Details:</strong> ${entry.details}`;
      card.appendChild(details);
    }
    const totalPrice = document.createElement('p');
    const price = isNaN(entry.totalPrice) ? '0.00' : Number(entry.totalPrice).toFixed(2);
    totalPrice.innerHTML = `<strong>Total Price:</strong> RM${price}`;
    card.appendChild(totalPrice);
    historyContainer.appendChild(card);
    });
  

  if (clearButton) {
    clearButton.addEventListener('click', () => {
      if (confirm("Are you sure you want to clear all your history?")) {
        localStorage.removeItem('requestHistory');
        localStorage.removeItem('transactionHistory'); 
        historyContainer.innerHTML = '<p>Your all history has been cleared.</p>';
        document.getElementById('summary').innerHTML = ''; 
      }
    });
  }
});





